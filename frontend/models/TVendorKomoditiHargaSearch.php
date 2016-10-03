<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TVendorKomoditiHarga;
use frontend\models\TVendorCompany;

/**
 * TVendorKomoditiHargaBarangSearch represents the model behind the search form about `frontend\models\TVendorKomoditiHarga`.
 */
class TVendorKomoditiHargaSearch extends TVendorKomoditiHarga
{
    /**
     * @inheritdoc
     */
    public $pMasterCurrency;
    public $tVendorTeknisKomoditi;

    public function rules()
    {
        return [
            [['t_vendor_komoditi_harga_id', 't_vendor_teknis_komoditi_id', 'p_master_currency_id', 'create_user', 'update_user'], 'integer'],
            [['harga_satuan'], 'number'],
            [['pMasterCurrency', 'tVendorTeknisKomoditi', 'start_date', 'end_date', 'create_date', 'update_date'], 'safe'],
            [['masih_berlaku'], 'boolean'],
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
        $query = TVendorKomoditiHarga::find()->where([
          'and',
          ['=','is_delete', 'f'],
          ['=','t_vendor_teknis_komoditi_id', $id]
          ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['pMasterCurrency'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['p_master_currency.currency_code' => SORT_ASC],
            'desc' => ['p_master_currency.currency_code' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['tVendorTeknisKomoditi'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['t_vendor_teknis_komoditi.nama' => SORT_ASC],
            'desc' => ['t_vendor_teknis_komoditi.nama' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_komoditi_harga_id' => $this->t_vendor_komoditi_harga_id,
            't_vendor_teknis_komoditi_id' => $this->t_vendor_teknis_komoditi_id,
            'p_master_currency_id' => $this->p_master_currency_id,
            'harga_satuan' => $this->harga_satuan,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'masih_berlaku' => $this->masih_berlaku,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'p_master_currency.currency_code', $this->pMasterCurrency])
            ->andFilterWhere(['like', 't_vendor_teknis_komoditi.nama', $this->tVendorTeknisKomoditi]);

        return $dataProvider;
    }
}
