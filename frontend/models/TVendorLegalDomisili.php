<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_legal_domisili".
 *
 * @property integer $t_vendor_legal_domisili_id
 * @property integer $t_vendor_company_id
 * @property string $domisili
 * @property string $tanggal
 * @property string $kadaluarsa
 * @property string $alamat
 * @property integer $p_master_city_id
 * @property integer $p_master_region_id
 * @property string $kode_pos
 * @property integer $p_master_country_id
 * @property string $telpon
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
class TVendorLegalDomisili extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_legal_domisili';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_city_id', 'p_master_region_id', 'p_master_country_id', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['domisili', 'alamat', 'kode_pos', 'telpon', 'lampiran'], 'string'],
            [['tanggal', 'kadaluarsa', 'create_date', 'update_date'], 'safe'],
            [['p_master_city_id', 'p_master_region_id', 'p_master_country_id', 'domisili', 'alamat', 'kode_pos', 'telpon', 'tanggal', 'kadaluarsa', 'create_user', 'update_user'], 'required'],
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
            't_vendor_legal_domisili_id' => 'Vendor Legal Domisili ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'domisili' => 'Nomor Domisili',
            'tanggal' => 'Tanggal',
            'kadaluarsa' => 'Kadaluarsa',
            'alamat' => 'Alamat',
            'p_master_city_id' => 'Kota',
            'p_master_region_id' => 'Provinsi',
            'kode_pos' => 'Kode Pos',
            'p_master_country_id' => 'Negara',
            'telpon' => 'Telpon',
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
