<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TUndangan;

/**
 * TUndanganSearch represents the model behind the search form about `backend\models\TUndangan`.
 */
class TUndanganSearch extends TUndangan
{
    /**
     * @inheritdoc
     */
    public $user;
    public function rules()
    {
        return [
            [['t_undangan_id', 'user_id'], 'integer'],
            [['user','no_undangan', 'waktu_kirim', 'tujuan', 'subjek', 'pesan'], 'safe'],
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
        $query = TUndangan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['user'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_undangan_id' => $this->t_undangan_id,
            'waktu_kirim' => $this->waktu_kirim,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'no_undangan', $this->no_undangan])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'subjek', $this->subjek])
            ->andFilterWhere(['like', 'pesan', $this->pesan])
            ->andFilterWhere(['like', 'user.username', $this->user]);

        return $dataProvider;
    }
}
