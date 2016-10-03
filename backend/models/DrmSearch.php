<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorCompany;

/**
 * DrmSearch represents the model behind the search form about `backend\models\TVendorCompany`.
 */
class DrmSearch extends TVendorCompany
{
    /**
     * @inheritdoc
     */
    public $userdataInternal;
    public $tVendorTeknisKomoditis;
    public $tVendorCompanySites;
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'user_id', 'referer', 'create_user', 'update_user'], 'integer'],
            [['tVendorCompanySites', 'tVendorTeknisKomoditis', 'userdataInternal', 'prefix', 'name', 'sufix', 'area', 'create_date', 'update_date', 'no_undangan'], 'safe'],
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
        $query = TVendorCompany::find()
        ->leftJoin('t_verifikasi_vendor', 't_verifikasi_vendor.t_vendor_company_id = t_vendor_teknis_komoditi.t_vendor_company_id')
        ->where(['=','t_verifikasi_vendor.rekomendasi', 1]);

        $query->joinWith('userdataInternal');

        $query->joinWith('tVendorTeknisKomoditis');

        $query->joinWith('tVendorCompanySites');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['userdataInternal'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['t_userdata_internal.fullname' => SORT_ASC],
            'desc' => ['t_userdata_internal.fullname' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_company_id' => $this->t_vendor_company_id,
            'user_id' => $this->user_id,
            'referer' => $this->referer,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'prefix', $this->prefix])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sufix', $this->sufix])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'no_undangan', $this->no_undangan])
            ->andFilterWhere(['like', 't_userdata_internal.fullname', $this->userdataInternal])
            ->andFilterWhere(['like', 't_vendor_teknis_komoditi.nama', $this->tVendorTeknisKomoditis])
            ->andFilterWhere(['=', 't_vendor_company_site.p_master_city_id', $this->tVendorCompanySites]);

        return $dataProvider;
    }
}
