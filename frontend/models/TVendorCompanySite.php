<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_company_site".
 *
 * @property integer $t_vendor_company_site_id
 * @property integer $t_vendor_company_id
 * @property string $address
 * @property integer $p_master_city_id
 * @property string $postal_code
 * @property integer $p_master_region_id
 * @property integer $p_master_country_id
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $website
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
class TVendorCompanySite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_vendor_company_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_city_id', 'p_master_region_id', 'p_master_country_id', 'create_user', 'update_user'], 'integer'],
            [['address', 'postal_code', 'phone', 'fax', 'email', 'website'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['t_vendor_company_id', 'p_master_city_id', 'p_master_region_id', 'p_master_country_id', 'address', 'postal_code', 'phone', 'email', 'create_user', 'update_user'], 'required'],
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
            't_vendor_company_site_id' => 'Vendor Company Site ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'address' => 'Alamat',
            'p_master_city_id' => 'Kota',
            'postal_code' => 'Kode Pos',
            'p_master_region_id' => 'Provinsi',
            'p_master_country_id' => 'Negara',
            'phone' => 'Telpon',
            'fax' => 'Fax',
            'email' => 'Email',
            'website' => 'Website',
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
