<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PMasterComodity;

/**
 * PMasterComoditySearch represents the model behind the search form about `backend\models\PMasterComodity`.
 */
class PMasterComoditySearch extends PMasterComodity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_master_comodity_id', 'type', 'create_user', 'update_user'], 'integer'],
            [['comodity_code', 'comodity_name', 'create_date', 'update_date'], 'safe'],
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
    public function search($params)
    {
        $query = PMasterComodity::find();

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
            'p_master_comodity_id' => $this->p_master_comodity_id,
            'type' => $this->type,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'comodity_code', $this->comodity_code])
            ->andFilterWhere(['like', 'comodity_name', $this->comodity_name]);

        return $dataProvider;
    }
}
