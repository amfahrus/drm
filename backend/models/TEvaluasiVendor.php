<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_evaluasi_vendor".
 *
 * @property integer $t_evaluasi_vendor_id
 * @property integer $t_vendor_company_id
 * @property double $nilai_ketersediaan
 * @property string $catatan_ketersediaan
 * @property double $nilai_work_instruction
 * @property string $catatan_work_instruction
 * @property double $nilai_ketepatan_waktu
 * @property string $catatan_ketepatan_waktu
 * @property double $nilai_nc_produk
 * @property string $catatan_nc_produk
 * @property double $nilai_dampak_lingkungan
 * @property string $catatan_dampak_lingkungan
 * @property double $nilai_pemenuhan_peraturan
 * @property string $catatan_pemenuhan_peraturan
 * @property double $nilai_kecelakaan_kerja
 * @property string $catatan_kecelakaan_kerja
 * @property double $nilai_hilang_jam_kerja
 * @property string $catatan_hilang_jam_kerja
 * @property string $hasil_penilaian
 * @property string $catatan
 * @property integer $t_vendor_teknis_komoditi_id
 * @property integer $create_user
 * @property string $create_date
 * @property integer $update_user
 * @property string $update_date
 *
 * @property TVendorCompany $tVendorCompany
 * @property TVendorTeknisKomoditi $tVendorTeknisKomoditi
 */
class TEvaluasiVendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_evaluasi_vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 't_vendor_teknis_komoditi_id', 'create_user', 'update_user'], 'integer'],
            [['nilai_ketersediaan', 'nilai_work_instruction', 'nilai_ketepatan_waktu', 'nilai_nc_produk', 'nilai_dampak_lingkungan', 'nilai_pemenuhan_peraturan', 'nilai_kecelakaan_kerja', 'nilai_hilang_jam_kerja', 'nxb_ketersediaan', 'nxb_work_instruction', 'nxb_ketepatan_waktu', 'nxb_nc_produk', 'nxb_dampak_lingkungan', 'nxb_pemenuhan_peraturan', 'nxb_kecelakaan_kerja', 'nxb_hilang_jam_kerja'], 'number'],
            [['nomor_kontrak', 't_vendor_company_id', 't_vendor_teknis_komoditi_id', 'nilai_ketersediaan', 'nilai_work_instruction', 'nilai_ketepatan_waktu', 'nilai_nc_produk', 'nilai_dampak_lingkungan', 'nilai_pemenuhan_peraturan', 'nilai_kecelakaan_kerja', 'nilai_hilang_jam_kerja', 'hasil_penilaian', 'nxb_ketersediaan', 'nxb_work_instruction', 'nxb_ketepatan_waktu', 'nxb_nc_produk', 'nxb_dampak_lingkungan', 'nxb_pemenuhan_peraturan', 'nxb_kecelakaan_kerja', 'nxb_hilang_jam_kerja'], 'required'],
            [['nomor_kontrak', 'catatan_ketersediaan', 'catatan_work_instruction', 'catatan_ketepatan_waktu', 'catatan_nc_produk', 'catatan_dampak_lingkungan', 'catatan_pemenuhan_peraturan', 'catatan_kecelakaan_kerja', 'catatan_hilang_jam_kerja', 'hasil_penilaian', 'catatan'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
            [['t_vendor_teknis_komoditi_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorTeknisKomoditi::className(), 'targetAttribute' => ['t_vendor_teknis_komoditi_id' => 't_vendor_teknis_komoditi_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_evaluasi_vendor_id' => 'T Evaluasi Vendor ID',
            't_vendor_company_id' => 'Vendor',
            'nomor_kontrak' => 'Nomor Kontrak',
            'nilai_ketersediaan' => 'Nilai Ketersediaan',
            'catatan_ketersediaan' => 'Catatan Ketersediaan',
            'nilai_work_instruction' => 'Nilai Work Instruction',
            'catatan_work_instruction' => 'Catatan Work Instruction',
            'nilai_ketepatan_waktu' => 'Nilai Ketepatan Waktu',
            'catatan_ketepatan_waktu' => 'Catatan Ketepatan Waktu',
            'nilai_nc_produk' => 'Nilai Nc Produk',
            'catatan_nc_produk' => 'Catatan Nc Produk',
            'nilai_dampak_lingkungan' => 'Nilai Dampak Lingkungan',
            'catatan_dampak_lingkungan' => 'Catatan Dampak Lingkungan',
            'nilai_pemenuhan_peraturan' => 'Nilai Pemenuhan Peraturan',
            'catatan_pemenuhan_peraturan' => 'Catatan Pemenuhan Peraturan',
            'nilai_kecelakaan_kerja' => 'Nilai Kecelakaan Kerja',
            'catatan_kecelakaan_kerja' => 'Catatan Kecelakaan Kerja',
            'nilai_hilang_jam_kerja' => 'Nilai Hilang Jam Kerja',
            'catatan_hilang_jam_kerja' => 'Catatan Hilang Jam Kerja',
            'hasil_penilaian' => 'Hasil Penilaian',
            'catatan' => 'Catatan',
            't_vendor_teknis_komoditi_id' => 'Komoditi',
            'create_user' => 'Create User',
            'create_date' => 'Create Date',
            'update_user' => 'Update User',
            'update_date' => 'Update Date',
            'nxb_ketersediaan' => '',
            'nxb_work_instruction' => '',
            'nxb_ketepatan_waktu' => '',
            'nxb_nc_produk' => '',
            'nxb_dampak_lingkungan' => '',
            'nxb_pemenuhan_peraturan' => '',
            'nxb_kecelakaan_kerja' => '',
            'nxb_hilang_jam_kerja' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisKomoditi()
    {
        return $this->hasOne(TVendorTeknisKomoditi::className(), ['t_vendor_teknis_komoditi_id' => 't_vendor_teknis_komoditi_id']);
    }
}
