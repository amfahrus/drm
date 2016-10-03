<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorCompany;
use backend\models\TVerifikasiVendor;

/**
 * TVerifikasiVendorSearch represents the model behind the search form about `backend\models\TVerifikasiVendor`.
 */
class TVerifikasiVendorSearch extends TVerifikasiVendor
{
    /**
     * @inheritdoc
     */
    public $tVendorCompany;

    public function rules()
    {
        return [
            [['t_verifikasi_vendor_id', 't_vendor_company_id', 'status_nama_perusahaan', 'status_alamat_perusahaan', 'status_akta_pendirian', 'status_nama_pengurus', 'status_alamat_pengurus', 'status_nama_pemilik', 'status_alamat_pemilik', 'status_npwp', 'status_sp_pkp', 'status_siup', 'status_siujk', 'status_sbu', 'status_ijin_domisili', 'status_tdu_tdp', 'status_asosiasi', 'status_iso_9001', 'status_ohsas_18001', 'status_iso_14001', 'status_pengalaman_kerja', 'status_barang_jasa', 'status_tenaga_ahli', 'status_daftar_alat', 'rekomendasi', 'create_user', 'update_user'], 'integer'],
            [['tVendorCompany', 'keterangan_nama_perusahaan', 'keterangan_alamat_perusahaan', 'keterangan_akta_pendirian', 'keterangan_nama_pengurus', 'keterangan_alamat_pengurus', 'keterangan_nama_pemilik', 'keterangan_alamat_pemilik', 'keterangan_npwp', 'keterangan_sp_pkp', 'keterangan_siup', 'keterangan_siujk', 'keterangan_sbu', 'keterangan_ijin_domisili', 'keterangan_tdu_tdp', 'keterangan_asosiasi', 'keterangan_iso_9001', 'keterangan_ohsas_18001', 'keterangan_iso_14001', 'keterangan_pengalaman_kerja', 'keterangan_barang_jasa', 'keterangan_tenaga_ahli', 'keterangan_daftar_alat', 'create_date', 'update_date'], 'safe'],
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
        $query = TVerifikasiVendor::find();
        //->joinWith(['tVendorCompany'], true, 'RIGHT OUTER JOIN')
        /*->where([
          'or',
          ['=','rekomendasi', 0],
          ['is', 'rekomendasi', null]
        ]);*/

        $query->joinWith('tVendorCompany');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['tVendorCompany'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['t_vendor_company.name' => SORT_ASC],
            'desc' => ['t_vendor_company.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_verifikasi_vendor_id' => $this->t_verifikasi_vendor_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'status_nama_perusahaan' => $this->status_nama_perusahaan,
            'status_alamat_perusahaan' => $this->status_alamat_perusahaan,
            'status_akta_pendirian' => $this->status_akta_pendirian,
            'status_nama_pengurus' => $this->status_nama_pengurus,
            'status_alamat_pengurus' => $this->status_alamat_pengurus,
            'status_nama_pemilik' => $this->status_nama_pemilik,
            'status_alamat_pemilik' => $this->status_alamat_pemilik,
            'status_npwp' => $this->status_npwp,
            'status_sp_pkp' => $this->status_sp_pkp,
            'status_siup' => $this->status_siup,
            'status_siujk' => $this->status_siujk,
            'status_sbu' => $this->status_sbu,
            'status_ijin_domisili' => $this->status_ijin_domisili,
            'status_tdu_tdp' => $this->status_tdu_tdp,
            'status_asosiasi' => $this->status_asosiasi,
            'status_iso_9001' => $this->status_iso_9001,
            'status_ohsas_18001' => $this->status_ohsas_18001,
            'status_iso_14001' => $this->status_iso_14001,
            'status_pengalaman_kerja' => $this->status_pengalaman_kerja,
            'status_barang_jasa' => $this->status_barang_jasa,
            'status_tenaga_ahli' => $this->status_tenaga_ahli,
            'status_daftar_alat' => $this->status_daftar_alat,
            'rekomendasi' => $this->rekomendasi,
            'create_user' => $this->create_user,
            'create_date' => $this->create_date,
            'update_user' => $this->update_user,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'keterangan_nama_perusahaan', $this->keterangan_nama_perusahaan])
            ->andFilterWhere(['like', 'keterangan_alamat_perusahaan', $this->keterangan_alamat_perusahaan])
            ->andFilterWhere(['like', 'keterangan_akta_pendirian', $this->keterangan_akta_pendirian])
            ->andFilterWhere(['like', 'keterangan_nama_pengurus', $this->keterangan_nama_pengurus])
            ->andFilterWhere(['like', 'keterangan_alamat_pengurus', $this->keterangan_alamat_pengurus])
            ->andFilterWhere(['like', 'keterangan_nama_pemilik', $this->keterangan_nama_pemilik])
            ->andFilterWhere(['like', 'keterangan_alamat_pemilik', $this->keterangan_alamat_pemilik])
            ->andFilterWhere(['like', 'keterangan_npwp', $this->keterangan_npwp])
            ->andFilterWhere(['like', 'keterangan_sp_pkp', $this->keterangan_sp_pkp])
            ->andFilterWhere(['like', 'keterangan_siup', $this->keterangan_siup])
            ->andFilterWhere(['like', 'keterangan_siujk', $this->keterangan_siujk])
            ->andFilterWhere(['like', 'keterangan_sbu', $this->keterangan_sbu])
            ->andFilterWhere(['like', 'keterangan_ijin_domisili', $this->keterangan_ijin_domisili])
            ->andFilterWhere(['like', 'keterangan_tdu_tdp', $this->keterangan_tdu_tdp])
            ->andFilterWhere(['like', 'keterangan_asosiasi', $this->keterangan_asosiasi])
            ->andFilterWhere(['like', 'keterangan_iso_9001', $this->keterangan_iso_9001])
            ->andFilterWhere(['like', 'keterangan_ohsas_18001', $this->keterangan_ohsas_18001])
            ->andFilterWhere(['like', 'keterangan_iso_14001', $this->keterangan_iso_14001])
            ->andFilterWhere(['like', 'keterangan_pengalaman_kerja', $this->keterangan_pengalaman_kerja])
            ->andFilterWhere(['like', 'keterangan_barang_jasa', $this->keterangan_barang_jasa])
            ->andFilterWhere(['like', 'keterangan_tenaga_ahli', $this->keterangan_tenaga_ahli])
            ->andFilterWhere(['like', 'keterangan_daftar_alat', $this->keterangan_daftar_alat])
            ->andFilterWhere(['like', 't_vendor_company.name', $this->tVendorCompany]);

        return $dataProvider;
    }
}
