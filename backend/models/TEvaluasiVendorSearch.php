<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorCompany;
use backend\models\TVendorTeknisKomoditi;
use backend\models\TEvaluasiVendor;

/**
 * TEvaluasiVendorSearch represents the model behind the search form about `backend\models\TEvaluasiVendor`.
 */
class TEvaluasiVendorSearch extends TEvaluasiVendor
{
    /**
     * @inheritdoc
     */
    public $tVendorCompany;
    public $tVendorTeknisKomoditi;

    public function rules()
    {
        return [
            [['t_evaluasi_vendor_id', 't_vendor_company_id', 't_vendor_teknis_komoditi_id', 'create_user', 'update_user'], 'integer'],
            [['nilai_ketersediaan', 'nilai_work_instruction', 'nilai_ketepatan_waktu', 'nilai_nc_produk', 'nilai_dampak_lingkungan', 'nilai_pemenuhan_peraturan', 'nilai_kecelakaan_kerja', 'nilai_hilang_jam_kerja'], 'number'],
            [['tVendorCompany', 'tVendorTeknisKomoditi', 'nomor_kontrak', 'catatan_ketersediaan', 'catatan_work_instruction', 'catatan_ketepatan_waktu', 'catatan_nc_produk', 'catatan_dampak_lingkungan', 'catatan_pemenuhan_peraturan', 'catatan_kecelakaan_kerja', 'catatan_hilang_jam_kerja', 'hasil_penilaian', 'catatan', 'create_date', 'update_date'], 'safe'],
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
        $query = TEvaluasiVendor::find();

        $query->joinWith('tVendorCompany');
        $query->joinWith('tVendorTeknisKomoditi');

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

        $dataProvider->sort->attributes['tVendorTeknisKomoditi'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['t_vendor_teknis_komoditi.nama' => SORT_ASC],
            'desc' => ['t_vendor_teknis_komoditi.nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_evaluasi_vendor_id' => $this->t_evaluasi_vendor_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'nilai_ketersediaan' => $this->nilai_ketersediaan,
            'nilai_work_instruction' => $this->nilai_work_instruction,
            'nilai_ketepatan_waktu' => $this->nilai_ketepatan_waktu,
            'nilai_nc_produk' => $this->nilai_nc_produk,
            'nilai_dampak_lingkungan' => $this->nilai_dampak_lingkungan,
            'nilai_pemenuhan_peraturan' => $this->nilai_pemenuhan_peraturan,
            'nilai_kecelakaan_kerja' => $this->nilai_kecelakaan_kerja,
            'nilai_hilang_jam_kerja' => $this->nilai_hilang_jam_kerja,
            't_vendor_teknis_komoditi_id' => $this->t_vendor_teknis_komoditi_id,
            'create_user' => $this->create_user,
            'create_date' => $this->create_date,
            'update_user' => $this->update_user,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'catatan_ketersediaan', $this->catatan_ketersediaan])
            ->andFilterWhere(['like', 'catatan_work_instruction', $this->catatan_work_instruction])
            ->andFilterWhere(['like', 'catatan_ketepatan_waktu', $this->catatan_ketepatan_waktu])
            ->andFilterWhere(['like', 'catatan_nc_produk', $this->catatan_nc_produk])
            ->andFilterWhere(['like', 'catatan_dampak_lingkungan', $this->catatan_dampak_lingkungan])
            ->andFilterWhere(['like', 'catatan_pemenuhan_peraturan', $this->catatan_pemenuhan_peraturan])
            ->andFilterWhere(['like', 'catatan_kecelakaan_kerja', $this->catatan_kecelakaan_kerja])
            ->andFilterWhere(['like', 'catatan_hilang_jam_kerja', $this->catatan_hilang_jam_kerja])
            ->andFilterWhere(['like', 'hasil_penilaian', $this->hasil_penilaian])
            ->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 't_vendor_company.name', $this->tVendorCompany])
            ->andFilterWhere(['like', 't_vendor_teknis_komoditi.nama', $this->tVendorTeknisKomoditi]);

        return $dataProvider;
    }
}
