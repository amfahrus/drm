<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorTeknisAlat;
use backend\models\TVendorCompany;

/**
 * TVendorTeknisAlatSearch represents the model behind the search form about `frontend\models\TVendorTeknisAlat`.
 */
class TVendorTeknisAlatSearch extends TVendorTeknisAlat
{
    /**
     * @inheritdoc
     */
    public $pMasterJenisAlat;

    public function rules()
    {
        return [
            [['t_vendor_teknis_alat_id', 't_vendor_company_id', 'p_master_jenis_alat_id', 'kuantitas', 'tahun'], 'integer'],
            [['pMasterJenisAlat','nama', 'merk', 'spesifikasi', 'kondisi', 'lokasi_sekarang'], 'safe'],
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
        $query = TVendorTeknisAlat::find()->where(['=','t_vendor_company_id', $id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['pMasterJenisAlat'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['p_master_jenis_alat.jenis_alat' => SORT_ASC],
            'desc' => ['p_master_jenis_alat.jenis_alat' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_teknis_alat_id' => $this->t_vendor_teknis_alat_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'p_master_jenis_alat_id' => $this->p_master_jenis_alat_id,
            'kuantitas' => $this->kuantitas,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'merk', $this->merk])
            ->andFilterWhere(['like', 'spesifikasi', $this->spesifikasi])
            ->andFilterWhere(['like', 'kondisi', $this->kondisi])
            ->andFilterWhere(['like', 'lokasi_sekarang', $this->lokasi_sekarang])
            ->andFilterWhere(['like', 'p_master_jenis_alat.jenis_alat', $this->pMasterJenisAlat]);

        return $dataProvider;
    }
}
