<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PMasterCity;

/**
 * PMasterCitySearch represents the model behind the search form about `backend\models\PMasterCity`.
 */
class PMasterCitySearch extends PMasterCity
{
    /**
     * @inheritdoc
     */
    public $pMasterRegion;

    public function rules()
    {
        return [
            [['p_master_city_id', 'p_master_region_id', 'create_user', 'update_user'], 'integer'],
            [['pMasterRegion','city_code', 'city_name', 'create_date', 'update_date'], 'safe'],
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
        $query = PMasterCity::find();

        $query->joinWith('pMasterRegion');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['pMasterRegion'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['p_master_region.region_name' => SORT_ASC],
            'desc' => ['p_master_region.region_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'p_master_city_id' => $this->p_master_city_id,
            'p_master_region_id' => $this->p_master_region_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'city_code', $this->city_code])
            ->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'p_master_region.region_name', $this->pMasterRegion]);

        return $dataProvider;
    }
}
