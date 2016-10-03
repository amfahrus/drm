<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_teknis_tambahan".
 *
 * @property integer $t_vendor_teknis_tambahan_id
 * @property integer $t_vendor_company_id
 * @property string $nama
 * @property string $alamat
 * @property integer $p_master_country_id
 * @property integer $p_master_region_id
 * @property integer $p_master_city_id
 * @property string $kodepos
 * @property string $kualifikasi
 * @property string $hubungan_kerja
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCity $pMasterCity
 * @property PMasterCountry $pMasterCountry
 * @property PMasterRegion $pMasterRegion
 * @property TVendorCompany $tVendorCompany
 */
class TVendorTeknisTambahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_teknis_tambahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_country_id', 'p_master_region_id', 'p_master_city_id', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['nama', 'alamat', 'kodepos', 'kualifikasi', 'hubungan_kerja', 'lampiran'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['p_master_country_id', 'p_master_region_id', 'p_master_city_id', 'nama', 'alamat', 'kodepos', 'kualifikasi', 'hubungan_kerja', 'create_user', 'update_user'], 'required'],
            [['p_master_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCity::className(), 'targetAttribute' => ['p_master_city_id' => 'p_master_city_id']],
            [['p_master_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCountry::className(), 'targetAttribute' => ['p_master_country_id' => 'p_master_country_id']],
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
            't_vendor_teknis_tambahan_id' => 'T Vendor Teknis Tambahan ID',
            't_vendor_company_id' => 'T Vendor Company ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'p_master_country_id' => 'Nama Negara',
            'p_master_region_id' => 'Nama Provinsi',
            'p_master_city_id' => 'Nama Kota',
            'kodepos' => 'Kodepos',
            'kualifikasi' => 'Kualifikasi',
            'hubungan_kerja' => 'Hubungan Kerja',
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
    public function getPMasterCountry()
    {
        return $this->hasOne(PMasterCountry::className(), ['p_master_country_id' => 'p_master_country_id']);
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
