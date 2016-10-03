<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_verifikasi_vendor".
 *
 * @property integer $t_verifikasi_vendor_id
 * @property integer $t_vendor_company_id
 * @property integer $status_nama_perusahaan
 * @property string $keterangan_nama_perusahaan
 * @property integer $status_alamat_perusahaan
 * @property string $keterangan_alamat_perusahaan
 * @property integer $status_akta_pendirian
 * @property string $keterangan_akta_pendirian
 * @property integer $status_nama_pengurus
 * @property string $keterangan_nama_pengurus
 * @property integer $status_alamat_pengurus
 * @property string $keterangan_alamat_pengurus
 * @property integer $status_nama_pemilik
 * @property string $keterangan_nama_pemilik
 * @property integer $status_alamat_pemilik
 * @property string $keterangan_alamat_pemilik
 * @property integer $status_npwp
 * @property string $keterangan_npwp
 * @property integer $status_sp_pkp
 * @property string $keterangan_sp_pkp
 * @property integer $status_siup
 * @property string $keterangan_siup
 * @property integer $status_siujk
 * @property string $keterangan_siujk
 * @property integer $status_sbu
 * @property string $keterangan_sbu
 * @property integer $status_ijin_domisili
 * @property string $keterangan_ijin_domisili
 * @property integer $status_tdu_tdp
 * @property string $keterangan_tdu_tdp
 * @property integer $status_asosiasi
 * @property string $keterangan_asosiasi
 * @property integer $status_iso_9001
 * @property string $keterangan_iso_9001
 * @property integer $status_ohsas_18001
 * @property string $keterangan_ohsas_18001
 * @property integer $status_iso_14001
 * @property string $keterangan_iso_14001
 * @property integer $status_pengalaman_kerja
 * @property string $keterangan_pengalaman_kerja
 * @property integer $status_barang_jasa
 * @property string $keterangan_barang_jasa
 * @property integer $status_tenaga_ahli
 * @property string $keterangan_tenaga_ahli
 * @property integer $status_daftar_alat
 * @property string $keterangan_daftar_alat
 * @property integer $rekomendasi
 * @property integer $create_user
 * @property string $create_date
 * @property integer $update_user
 * @property string $update_date
 *
 * @property TVendorCompany $tVendorCompany
 */
class TVerifikasiVendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $klasifikasi;

    public static function tableName()
    {
        return 't_verifikasi_vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'status_nama_perusahaan', 'status_alamat_perusahaan', 'status_akta_pendirian', 'status_nama_pengurus', 'status_alamat_pengurus', 'status_nama_pemilik', 'status_alamat_pemilik', 'status_npwp', 'status_sp_pkp', 'status_siup', 'status_siujk', 'status_sbu', 'status_ijin_domisili', 'status_tdu_tdp', 'status_asosiasi', 'status_iso_9001', 'status_ohsas_18001', 'status_iso_14001', 'status_pengalaman_kerja', 'status_barang_jasa', 'status_tenaga_ahli', 'status_daftar_alat', 'rekomendasi', 'create_user', 'update_user'], 'integer'],
            [['klasifikasi'], 'required'],
            [['klasifikasi', 'keterangan_nama_perusahaan', 'keterangan_alamat_perusahaan', 'keterangan_akta_pendirian', 'keterangan_nama_pengurus', 'keterangan_alamat_pengurus', 'keterangan_nama_pemilik', 'keterangan_alamat_pemilik', 'keterangan_npwp', 'keterangan_sp_pkp', 'keterangan_siup', 'keterangan_siujk', 'keterangan_sbu', 'keterangan_ijin_domisili', 'keterangan_asosiasi', 'keterangan_iso_9001', 'keterangan_ohsas_18001', 'keterangan_iso_14001', 'keterangan_pengalaman_kerja', 'keterangan_barang_jasa', 'keterangan_tenaga_ahli', 'keterangan_daftar_alat'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['keterangan_tdu_tdp'], 'string', 'max' => 1],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_verifikasi_vendor_id' => 'T Verifikasi Vendor ID',
            't_vendor_company_id' => 'T Vendor Company ID',
            'status_nama_perusahaan' => 'Status Nama Perusahaan',
            'keterangan_nama_perusahaan' => 'Keterangan Nama Perusahaan',
            'status_alamat_perusahaan' => 'Status Alamat Perusahaan',
            'keterangan_alamat_perusahaan' => 'Keterangan Alamat Perusahaan',
            'status_akta_pendirian' => 'Status Akta Pendirian',
            'keterangan_akta_pendirian' => 'Keterangan Akta Pendirian',
            'status_nama_pengurus' => 'Status Nama Pengurus',
            'keterangan_nama_pengurus' => 'Keterangan Nama Pengurus',
            'status_alamat_pengurus' => 'Status Alamat Pengurus',
            'keterangan_alamat_pengurus' => 'Keterangan Alamat Pengurus',
            'status_nama_pemilik' => 'Status Nama Pemilik',
            'keterangan_nama_pemilik' => 'Keterangan Nama Pemilik',
            'status_alamat_pemilik' => 'Status Alamat Pemilik',
            'keterangan_alamat_pemilik' => 'Keterangan Alamat Pemilik',
            'status_npwp' => 'Status Npwp',
            'keterangan_npwp' => 'Keterangan Npwp',
            'status_sp_pkp' => 'Status Sp Pkp',
            'keterangan_sp_pkp' => 'Keterangan Sp Pkp',
            'status_siup' => 'Status Siup',
            'keterangan_siup' => 'Keterangan Siup',
            'status_siujk' => 'Status Siujk',
            'keterangan_siujk' => 'Keterangan Siujk',
            'status_sbu' => 'Status Sbu',
            'keterangan_sbu' => 'Keterangan Sbu',
            'status_ijin_domisili' => 'Status Ijin Domisili',
            'keterangan_ijin_domisili' => 'Keterangan Ijin Domisili',
            'status_tdu_tdp' => 'Status Tdu Tdp',
            'keterangan_tdu_tdp' => 'Keterangan Tdu Tdp',
            'status_asosiasi' => 'Status Asosiasi',
            'keterangan_asosiasi' => 'Keterangan Asosiasi',
            'status_iso_9001' => 'Status Iso 9001',
            'keterangan_iso_9001' => 'Keterangan Iso 9001',
            'status_ohsas_18001' => 'Status Ohsas 18001',
            'keterangan_ohsas_18001' => 'Keterangan Ohsas 18001',
            'status_iso_14001' => 'Status Iso 14001',
            'keterangan_iso_14001' => 'Keterangan Iso 14001',
            'status_pengalaman_kerja' => 'Status Pengalaman Kerja',
            'keterangan_pengalaman_kerja' => 'Keterangan Pengalaman Kerja',
            'status_barang_jasa' => 'Status Barang Jasa',
            'keterangan_barang_jasa' => 'Keterangan Barang Jasa',
            'status_tenaga_ahli' => 'Status Tenaga Ahli',
            'keterangan_tenaga_ahli' => 'Keterangan Tenaga Ahli',
            'status_daftar_alat' => 'Status Daftar Alat',
            'keterangan_daftar_alat' => 'Keterangan Daftar Alat',
            'klasifikasi' => 'Kualifikasi',
            'rekomendasi' => 'Rekomendasi',
            'create_user' => 'Create User',
            'create_date' => 'Create Date',
            'update_user' => 'Update User',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
