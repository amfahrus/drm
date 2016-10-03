<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_teknis_alat".
 *
 * @property integer $t_vendor_teknis_alat_id
 * @property integer $t_vendor_company_id
 * @property integer $p_master_jenis_alat_id
 * @property string $nama
 * @property string $merk
 * @property string $spesifikasi
 * @property string $kondisi
 * @property integer $kuantitas
 * @property integer $tahun
 * @property string $lokasi_sekarang
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterJenisAlat $pMasterJenisAlat
 * @property TVendorCompany $tVendorCompany
 */
class TVendorTeknisAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_vendor_teknis_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_jenis_alat_id', 'kuantitas', 'tahun'], 'integer'],
            [['nama', 'merk', 'spesifikasi', 'kondisi', 'lokasi_sekarang'], 'string'],
            [['p_master_jenis_alat_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterJenisAlat::className(), 'targetAttribute' => ['p_master_jenis_alat_id' => 'p_master_jenis_alat_id']],
            [['create_date', 'update_date'], 'safe'],
            [['p_master_jenis_alat_id', 'kuantitas', 'tahun', 'nama', 'merk', 'spesifikasi', 'kondisi', 'lokasi_sekarang', 'create_user', 'update_user'], 'required'],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_teknis_alat_id' => 'Vendor Teknis Alat ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'p_master_jenis_alat_id' => 'Kategori',
            'nama' => 'Nama',
            'merk' => 'Merk',
            'spesifikasi' => 'Spesifikasi',
            'kondisi' => 'Kondisi',
            'kuantitas' => 'Kuantitas',
            'tahun' => 'Tahun Pembuatan',
            'lokasi_sekarang' => 'Lokasi Sekarang',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterJenisAlat()
    {
        return $this->hasOne(PMasterJenisAlat::className(), ['p_master_jenis_alat_id' => 'p_master_jenis_alat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
