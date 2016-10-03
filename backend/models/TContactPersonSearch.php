<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TContactPerson;
use backend\models\TVendorCompany;

/**
 * TContactPersonSearch represents the model behind the search form about `frontend\models\TContactPerson`.
 */
class TContactPersonSearch extends TContactPerson
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_contact_person_id', 't_vendor_company_id', 'create_user', 'update_user'], 'integer'],
            [['cp_name', 'cp_position', 'cp_phone', 'cp_email', 'create_date', 'update_date'], 'safe'],
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
        $query = TContactPerson::find()->where(['=','t_vendor_company_id', $id]);

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
            't_contact_person_id' => $this->t_contact_person_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'cp_name', $this->cp_name])
            ->andFilterWhere(['like', 'cp_position', $this->cp_position])
            ->andFilterWhere(['like', 'cp_phone', $this->cp_phone])
            ->andFilterWhere(['like', 'cp_email', $this->cp_email]);

        return $dataProvider;
    }
}
