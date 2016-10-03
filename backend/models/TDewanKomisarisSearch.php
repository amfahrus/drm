<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorKepengurusan;
use backend\models\TVendorCompany;

/**
 * TVendorKepengurusanSearch represents the model behind the search form about `frontend\models\TVendorKepengurusan`.
 */
class TDewanKomisarisSearch extends TVendorKepengurusan
{
    /**
     * @inheritdoc
     */
    public $pMasterCity;

    public function rules()
    {
        return [
            [['t_vendor_kepengurusan_id', 't_vendor_company_id', 'p_master_city_id', 'p_master_region_id', 'jenis', 'create_user', 'update_user'], 'integer'],
            [['pMasterCity','nama', 'jabatan', 'telpon', 'email', 'ktp', 'npwp', 'alamat', 'kode_pos', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorKepengurusan::find()->where([
          'and',
          ['=','t_vendor_company_id', $id],
          ['=', 'jenis', 3]
        ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['pMasterCity'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['p_master_city.city_name' => SORT_ASC],
            'desc' => ['p_master_city.city_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_kepengurusan_id' => $this->t_vendor_kepengurusan_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'p_master_city_id' => $this->p_master_city_id,
            'p_master_region_id' => $this->p_master_region_id,
            'jenis' => $this->jenis,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'telpon', $this->telpon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'ktp', $this->ktp])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran])
            ->andFilterWhere(['like', 'p_master_city.city_name', $this->pMasterCity]);

        return $dataProvider;
    }
}
