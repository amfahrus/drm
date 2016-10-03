<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PMasterCurrency;

/**
 * PMasterCurrencySearch represents the model behind the search form about `backend\models\PMasterCurrency`.
 */
class PMasterCurrencySearch extends PMasterCurrency
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_master_currency_id', 'create_user', 'update_user'], 'integer'],
            [['currency_code', 'currency_desc', 'create_date', 'update_date'], 'safe'],
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
        $query = PMasterCurrency::find();

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
            'p_master_currency_id' => $this->p_master_currency_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'currency_code', $this->currency_code])
            ->andFilterWhere(['like', 'currency_desc', $this->currency_desc]);

        return $dataProvider;
    }
}
