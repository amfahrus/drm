<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorLegalDomisili;
use backend\models\TVendorCompany;

/**
 * TVendorLegalDomisiliSearch represents the model behind the search form about `frontend\models\TVendorLegalDomisili`.
 */
class TVendorLegalDomisiliSearch extends TVendorLegalDomisili
{
    /**
     * @inheritdoc
     */
    public $pMasterCity;

    public function rules()
    {
        return [
            [['t_vendor_legal_domisili_id', 't_vendor_company_id', 'p_master_city_id', 'p_master_region_id', 'p_master_country_id', 'create_user', 'update_user'], 'integer'],
            [['pMasterCity', 'domisili', 'tanggal', 'kadaluarsa', 'alamat', 'kode_pos', 'telpon', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorLegalDomisili::find()->where(['=','t_vendor_company_id', $id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['pMasterCity'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['p_master_city.city_name' => SORT_ASC],
            'desc' => ['p_master_city.city_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_legal_domisili_id' => $this->t_vendor_legal_domisili_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'tanggal' => $this->tanggal,
            'kadaluarsa' => $this->kadaluarsa,
            'p_master_city_id' => $this->p_master_city_id,
            'p_master_region_id' => $this->p_master_region_id,
            'p_master_country_id' => $this->p_master_country_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'domisili', $this->domisili])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'telpon', $this->telpon])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran])
            ->andFilterWhere(['like', 'p_master_city.city_name', $this->pMasterCity]);

        return $dataProvider;
    }
}
