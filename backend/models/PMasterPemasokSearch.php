<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PMasterPemasok;

/**
 * PMasterPemasokSearch represents the model behind the search form about `backend\models\PMasterPemasok`.
 */
class PMasterPemasokSearch extends PMasterPemasok
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_master_pemasok_id', 'create_user', 'update_user'], 'integer'],
            [['tipe_pemasok', 'create_date', 'update_date'], 'safe'],
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
        $query = PMasterPemasok::find();

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
            'p_master_pemasok_id' => $this->p_master_pemasok_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'tipe_pemasok', $this->tipe_pemasok]);

        return $dataProvider;
    }
}
