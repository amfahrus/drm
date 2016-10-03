<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TVendorKeuRekening;
use frontend\models\TVendorCompany;

/**
 * TVendorKeuRekeningSearch represents the model behind the search form about `frontend\models\TVendorKeuRekening`.
 */
class TVendorKeuRekeningSearch extends TVendorKeuRekening
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_keu_rekening_id', 't_vendor_company_id', 'p_master_currency_id', 'create_user', 'update_user'], 'integer'],
            [['nomor', 'pemegang', 'nama_bank', 'cabang_bank', 'alamat', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();
        $query = TVendorKeuRekening::find()->where(['=','t_vendor_company_id', $vendor->t_vendor_company_id]);

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
            't_vendor_keu_rekening_id' => $this->t_vendor_keu_rekening_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'p_master_currency_id' => $this->p_master_currency_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'nomor', $this->nomor])
            ->andFilterWhere(['like', 'pemegang', $this->pemegang])
            ->andFilterWhere(['like', 'nama_bank', $this->nama_bank])
            ->andFilterWhere(['like', 'cabang_bank', $this->cabang_bank])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran]);

        return $dataProvider;
    }
}
