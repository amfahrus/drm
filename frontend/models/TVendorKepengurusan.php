<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_kepengurusan".
 *
 * @property integer $t_vendor_kepengurusan_id
 * @property integer $t_vendor_company_id
 * @property string $nama
 * @property string $jabatan
 * @property string $telpon
 * @property string $email
 * @property string $ktp
 * @property string $npwp
 * @property string $alamat
 * @property integer $p_master_city_id
 * @property integer $p_master_region_id
 * @property string $kode_pos
 * @property integer $jenis
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCity $pMasterCity
 * @property PMasterRegion $pMasterRegion
 * @property TVendorCompany $tVendorCompany
 */
class TVendorKepengurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_kepengurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_city_id', 'p_master_region_id', 'jenis', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['nama', 'jabatan', 'telpon', 'email', 'ktp', 'npwp', 'alamat', 'kode_pos', 'lampiran'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['p_master_city_id', 'p_master_region_id', 'nama', 'jabatan', 'telpon', 'email', 'ktp', 'npwp', 'alamat', 'kode_pos', 'create_user', 'update_user'], 'required'],
            [['p_master_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCity::className(), 'targetAttribute' => ['p_master_city_id' => 'p_master_city_id']],
            [['p_master_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterRegion::className(), 'targetAttribute' => ['p_master_region_id' => 'p_master_region_id']],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_kepengurusan_id' => 'T Vendor Kepengurusan ID',
            't_vendor_company_id' => 'T Vendor Company ID',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
            'telpon' => 'Telpon',
            'email' => 'Email',
            'ktp' => 'No. KTP',
            'npwp' => 'No. NPWP',
            'alamat' => 'Alamat',
            'p_master_city_id' => 'Kota',
            'p_master_region_id' => 'Provinsi',
            'kode_pos' => 'Kode Pos',
            'jenis' => 'Jenis',
            'lampiran' => 'Lampiran',
            'uploadFile' => 'Lampiran',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterCity()
    {
        return $this->hasOne(PMasterCity::className(), ['p_master_city_id' => 'p_master_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterRegion()
    {
        return $this->hasOne(PMasterRegion::className(), ['p_master_region_id' => 'p_master_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
