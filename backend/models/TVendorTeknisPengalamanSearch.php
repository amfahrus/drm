<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorTeknisPengalaman;
use backend\models\TVendorCompany;

/**
 * TVendorTeknisPengalamanSearch represents the model behind the search form about `frontend\models\TVendorTeknisPengalaman`.
 */
class TVendorTeknisPengalamanSearch extends TVendorTeknisPengalaman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_teknis_pengalaman_id', 't_vendor_company_id', 'p_master_currency_id', 'create_user', 'update_user'], 'integer'],
            [['nama_pelanggan', 'nama_proyek', 'keterangan', 'nomor_kontrak', 'tanggal_mulai', 'tanggal_selesai', 'contact_person', 'nomor_kontak', 'create_date', 'update_date'], 'safe'],
            [['nilai_proyek'], 'number'],
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
        $query = TVendorTeknisPengalaman::find()->where(['=','t_vendor_company_id', $id]);

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
            't_vendor_teknis_pengalaman_id' => $this->t_vendor_teknis_pengalaman_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'p_master_currency_id' => $this->p_master_currency_id,
            'nilai_proyek' => $this->nilai_proyek,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'nama_pelanggan', $this->nama_pelanggan])
            ->andFilterWhere(['like', 'nama_proyek', $this->nama_proyek])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'nomor_kontrak', $this->nomor_kontrak])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'nomor_kontak', $this->nomor_kontak]);

        return $dataProvider;
    }
}
