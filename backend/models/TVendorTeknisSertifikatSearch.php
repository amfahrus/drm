<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorTeknisSertifikat;
use backend\models\TVendorCompany;

/**
 * TVendorTeknisSertifikatSearch represents the model behind the search form about `frontend\models\TVendorTeknisSertifikat`.
 */
class TVendorTeknisSertifikatSearch extends TVendorTeknisSertifikat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_teknis_sertifikat_id', 't_vendor_company_id', 'create_user', 'update_user'], 'integer'],
            [['jenis', 'sertifikat', 'penerbit', 'tanggal', 'kadaluarsa', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorTeknisSertifikat::find()->where(['=','t_vendor_company_id', $id]);

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
            't_vendor_teknis_sertifikat_id' => $this->t_vendor_teknis_sertifikat_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'tanggal' => $this->tanggal,
            'kadaluarsa' => $this->kadaluarsa,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'jenis', $this->jenis])
            ->andFilterWhere(['like', 'penerbit', $this->penerbit])
            ->andFilterWhere(['like', 'penerbit', $this->penerbit])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran]);

        return $dataProvider;
    }
}
