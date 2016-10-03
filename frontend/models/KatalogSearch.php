<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use frontend\models\TVendorTeknisKomoditi;
use frontend\models\PMasterComodity;

/**
 * TVendorTeknisKomoditiBarangSearch represents the model behind the search form about `frontend\models\TVendorTeknisKomoditi`.
 */
class KatalogSearch extends TVendorTeknisKomoditi
{
    /**
     * @inheritdoc
     */
    public $tVendorCompany;
    public $HargaSatuan;

    public function rules()
    {
        return [
            [['t_vendor_teknis_komoditi_id', 't_vendor_company_id', 'p_master_comodity_id', 'p_master_pemasok_id', 'create_user', 'update_user', 'jenis'], 'integer'],
            [['HargaSatuan', 'tVendorCompany', 'nama', 'merk', 'sumber', 'area', 'unit', 'lampiran', 'create_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params,$id)
    {
        if($id){
            $query = TVendorTeknisKomoditi::find()
              ->select('t_vendor_teknis_komoditi.*,t_vendor_company.name,t_vendor_komoditi_harga.harga_satuan')
              ->leftJoin('t_verifikasi_vendor', 't_verifikasi_vendor.t_vendor_company_id = t_vendor_teknis_komoditi.t_vendor_company_id')
              ->leftJoin('t_vendor_company', 't_vendor_company.t_vendor_company_id = t_vendor_teknis_komoditi.t_vendor_company_id')
              ->leftJoin('t_vendor_komoditi_harga', 't_vendor_komoditi_harga.t_vendor_teknis_komoditi_id = t_vendor_teknis_komoditi.t_vendor_teknis_komoditi_id')
              ->where([
                'and',
                ['=','t_verifikasi_vendor.rekomendasi', 1],
                ['=','t_vendor_komoditi_harga.masih_berlaku', 't'],
                ['=','t_vendor_teknis_komoditi.is_delete', 'f'],
                ['=','t_vendor_teknis_komoditi.p_master_comodity_id', $id]
                ]);
        } else {
            $query = TVendorTeknisKomoditi::find()
              ->select('t_vendor_teknis_komoditi.*,t_vendor_company.name,t_vendor_komoditi_harga.harga_satuan')
              ->leftJoin('t_verifikasi_vendor', 't_verifikasi_vendor.t_vendor_company_id = t_vendor_teknis_komoditi.t_vendor_company_id')
              ->leftJoin('t_vendor_company', 't_vendor_company.t_vendor_company_id = t_vendor_teknis_komoditi.t_vendor_company_id')
              ->leftJoin('t_vendor_komoditi_harga', 't_vendor_komoditi_harga.t_vendor_teknis_komoditi_id = t_vendor_teknis_komoditi.t_vendor_teknis_komoditi_id')
              ->where([
                'and',
                ['=','t_verifikasi_vendor.rekomendasi', 1],
                ['=','t_vendor_teknis_komoditi.is_delete', 'f'],
                ['=','t_vendor_komoditi_harga.masih_berlaku', 't']
                ]);
        }
          //->all();

        // add conditions that should always apply here

        /*$dataProvider = new ArrayDataProvider([
            'allModels' => ArrayHelper::toArray($query),
            'pagination' => [
                'pageSize' => 12
            ],
            'sort' => [
                'attributes' => ['
                      tVendorKomoditiHarga' => [
                          'asc' => ['tVendorKomoditiHarga' => SORT_ASC],
                          'desc' => ['tVendorKomoditiHarga' => SORT_DESC],
                          'default' => SORT_DESC,
                          'label' => 'Harga',
                      ],
                ],
            ],
        ]);*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 9
            ],
        ]);

        $dataProvider->sort->attributes['HargaSatuan'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['t_vendor_komoditi_harga.harga_satuan' => SORT_ASC],
            'desc' => ['t_vendor_komoditi_harga.harga_satuan' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'upper(nama)', strtoupper($this->nama)]);
        $query->andFilterWhere(['like', 'upper(name)', strtoupper($this->tVendorCompany)]);

        return $dataProvider;
    }

    public function barang()
    {
        $query = PMasterComodity::find()
          ->select('p_master_comodity.p_master_comodity_id,comodity_name,count(t_vendor_teknis_komoditi.t_vendor_teknis_komoditi_id) as count,t_vendor_komoditi_harga.harga_satuan')
          ->leftJoin('t_vendor_teknis_komoditi', 't_vendor_teknis_komoditi.p_master_comodity_id = p_master_comodity.p_master_comodity_id')
          ->leftJoin('t_verifikasi_vendor', 't_verifikasi_vendor.t_vendor_company_id = t_vendor_teknis_komoditi.t_vendor_company_id')
          ->leftJoin('t_vendor_komoditi_harga', 't_vendor_komoditi_harga.t_vendor_teknis_komoditi_id = t_vendor_teknis_komoditi.t_vendor_teknis_komoditi_id')
          ->where([
            'and',
            ['=','t_verifikasi_vendor.rekomendasi', 1],
            ['=','t_vendor_komoditi_harga.masih_berlaku', 't'],
            ['=','t_vendor_teknis_komoditi.is_delete', 'f'],
            ['=', 'p_master_comodity.type', 1]
            ])
          ->groupBy('p_master_comodity.p_master_comodity_id,comodity_name,harga_satuan')
          ->all();

        return $query;
    }
    public function jasa()
    {
        $query = PMasterComodity::find()
          ->select('p_master_comodity.p_master_comodity_id,comodity_name,count(t_vendor_teknis_komoditi.t_vendor_teknis_komoditi_id) as count,t_vendor_komoditi_harga.harga_satuan')
          ->leftJoin('t_vendor_teknis_komoditi', 't_vendor_teknis_komoditi.p_master_comodity_id = p_master_comodity.p_master_comodity_id')
          ->leftJoin('t_verifikasi_vendor', 't_verifikasi_vendor.t_vendor_company_id = t_vendor_teknis_komoditi.t_vendor_company_id')
          ->leftJoin('t_vendor_komoditi_harga', 't_vendor_komoditi_harga.t_vendor_teknis_komoditi_id = t_vendor_teknis_komoditi.t_vendor_teknis_komoditi_id')
          ->where([
            'and',
            ['=','t_verifikasi_vendor.rekomendasi', 1],
            ['=','t_vendor_komoditi_harga.masih_berlaku', 't'],
            ['=','t_vendor_teknis_komoditi.is_delete', 'f'],
            ['=', 'p_master_comodity.type', 2]
            ])
          ->groupBy('p_master_comodity.p_master_comodity_id,comodity_name,harga_satuan')
          ->all();

        return $query;
    }
}
