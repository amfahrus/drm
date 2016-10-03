<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorSdm;
use backend\models\TVendorCompany;

/**
 * TVendorSdmUtamaSearch represents the model behind the search form about `frontend\models\TVendorSdm`.
 */
class TVendorSdmUtamaSearch extends TVendorSdm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_sdm_id', 't_vendor_company_id', 'umur', 'is_utama', 'create_user', 'update_user'], 'integer'],
            [['nama', 'pendidikan', 'keahlian', 'pengalaman', 'status', 'kewarganegaraan', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorSdm::find()->where([
          'and',
          ['=','t_vendor_company_id', $id],
          ['=', 'is_utama', 1]
        ]);

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
            't_vendor_sdm_id' => $this->t_vendor_sdm_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'umur' => $this->umur,
            'is_utama' => $this->is_utama,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'keahlian', $this->keahlian])
            ->andFilterWhere(['like', 'pengalaman', $this->pengalaman])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'kewarganegaraan', $this->kewarganegaraan])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran]);

        return $dataProvider;
    }
}
