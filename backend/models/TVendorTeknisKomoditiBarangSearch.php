<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorTeknisKomoditi;
use backend\models\TVendorCompany;

/**
 * TVendorTeknisKomoditiBarangSearch represents the model behind the search form about `frontend\models\TVendorTeknisKomoditi`.
 */
class TVendorTeknisKomoditiBarangSearch extends TVendorTeknisKomoditi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_teknis_komoditi_id', 't_vendor_company_id', 'p_master_comodity_id', 'p_master_pemasok_id', 'create_user', 'update_user', 'jenis'], 'integer'],
            [['nama', 'merk', 'sumber', 'area', 'unit', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorTeknisKomoditi::find()->where([
          'and',
          ['=','t_vendor_company_id', $id],
          ['=', 'jenis', 1],
          ['=', 'is_delete', 'f'],
        ]);

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
            ->andFilterWhere(['like', 'lampiran', $this->lampiran]);

        return $dataProvider;
    }
}
