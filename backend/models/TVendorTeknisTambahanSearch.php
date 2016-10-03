<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorTeknisTambahan;
use backend\models\TVendorCompany;

/**
 * TVendorTeknisTambahanSearch represents the model behind the search form about `frontend\models\TVendorTeknisTambahan`.
 */
class TVendorTeknisTambahanSearch extends TVendorTeknisTambahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_teknis_tambahan_id', 't_vendor_company_id', 'p_master_country_id', 'p_master_region_id', 'p_master_city_id', 'create_user', 'update_user'], 'integer'],
            [['nama', 'alamat', 'kodepos', 'kualifikasi', 'hubungan_kerja', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorTeknisTambahan::find()->where(['=','t_vendor_company_id', $id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_teknis_tambahan_id' => $this->t_vendor_teknis_tambahan_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'p_master_country_id' => $this->p_master_country_id,
            'p_master_region_id' => $this->p_master_region_id,
            'p_master_city_id' => $this->p_master_city_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'kualifikasi', $this->kualifikasi])
            ->andFilterWhere(['like', 'hubungan_kerja', $this->hubungan_kerja])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran]);

        return $dataProvider;
    }
}
