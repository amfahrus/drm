<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TVendorKeuModal;

/**
 * TVendorKeuModalSearch represents the model behind the search form about `frontend\models\TVendorKeuModal`.
 */
class TVendorKeuModalSearch extends TVendorKeuModal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_keu_modal_id', 't_vendor_company_id', 'valuta_dasar', 'valuta_disetor', 'create_user', 'update_user'], 'integer'],
            [['klasifikasi', 'create_date', 'update_date'], 'safe'],
            [['nilai_dasar', 'nilai_disetor'], 'number'],
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
        $query = TVendorKeuModal::find();

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
            't_vendor_keu_modal_id' => $this->t_vendor_keu_modal_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'valuta_dasar' => $this->valuta_dasar,
            'nilai_dasar' => $this->nilai_dasar,
            'valuta_disetor' => $this->valuta_disetor,
            'nilai_disetor' => $this->nilai_disetor,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'klasifikasi', $this->klasifikasi]);

        return $dataProvider;
    }
}
