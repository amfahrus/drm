<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TVendorTeknisKomoditi;
use frontend\models\TVendorCompany;

/**
 * TVendorTeknisKomoditiJasaSearch represents the model behind the search form about `frontend\models\TVendorTeknisKomoditi`.
 */
class TVendorTeknisKomoditiJasaSearch extends TVendorTeknisKomoditi
{
    /**
     * @inheritdoc
     */
    public $pMasterComodity;
    public $pMasterPemasok;

    public function rules()
    {
        return [
            [['t_vendor_teknis_komoditi_id', 't_vendor_company_id', 'p_master_comodity_id', 'p_master_pemasok_id', 'create_user', 'update_user', 'jenis'], 'integer'],
            [['pMasterComodity', 'pMasterPemasok', 'nama', 'merk', 'sumber', 'area', 'unit', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorTeknisKomoditi::find()->where([
          'and',
          ['=','t_vendor_company_id', $vendor->t_vendor_company_id],
          ['=', 'jenis', 2],
          ['=', 'is_delete', 'f'],
        ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['pMasterPemasok'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['p_master_pemasok.tipe_pemasok' => SORT_ASC],
            'desc' => ['p_master_pemasok.tipe_pemasok' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['pMasterComodity'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['p_master_comodity.comodity_name' => SORT_ASC],
            'desc' => ['p_master_comodity.comodity_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_teknis_komoditi_id' => $this->t_vendor_teknis_komoditi_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'p_master_comodity_id' => $this->p_master_comodity_id,
            'p_master_pemasok_id' => $this->p_master_pemasok_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
            'jenis' => $this->jenis,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'merk', $this->merk])
            ->andFilterWhere(['like', 'sumber', $this->sumber])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran])
            ->andFilterWhere(['like', 'p_master_pemasok.tipe_pemasok', $this->pMasterPemasok])
            ->andFilterWhere(['like', 'p_master_comodity.comodity_name', $this->pMasterComodity]);

        return $dataProvider;
    }
}
