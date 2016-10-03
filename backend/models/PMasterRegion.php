<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "p_master_region".
 *
 * @property integer $p_master_region_id
 * @property integer $p_master_country_id
 * @property string $region_code
 * @property string $region_name
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCity[] $pMasterCities
 * @property PMasterCountry $pMasterCountry
 * @property TVendorCompanySite[] $tVendorCompanySites
 * @property TVendorKepengurusan[] $tVendorKepengurusans
 * @property TVendorLegalDomisili[] $tVendorLegalDomisilis
 * @property TVendorLegalNpwp[] $tVendorLegalNpwps
 * @property TVendorTeknisTambahan[] $tVendorTeknisTambahans
 */
class PMasterRegion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_master_region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_master_country_id', 'create_user', 'update_user'], 'integer'],
            [['region_code', 'region_name'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['create_user', 'update_user'], 'required'],
            [['p_master_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCountry::className(), 'targetAttribute' => ['p_master_country_id' => 'p_master_country_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_master_region_id' => 'P Master Region ID',
            'p_master_country_id' => 'P Master Country ID',
            'region_code' => 'Region Code',
            'region_name' => 'Region Name',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterCities()
    {
        return $this->hasMany(PMasterCity::className(), ['p_master_region_id' => 'p_master_region_id']);
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
    public function getTVendorCompanySites()
    {
        return $this->hasMany(TVendorCompanySite::className(), ['p_master_region_id' => 'p_master_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKepengurusans()
    {
        return $this->hasMany(TVendorKepengurusan::className(), ['p_master_region_id' => 'p_master_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalDomisilis()
    {
        return $this->hasMany(TVendorLegalDomisili::className(), ['p_master_region_id' => 'p_master_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalNpwps()
    {
        return $this->hasMany(TVendorLegalNpwp::className(), ['p_master_region_id' => 'p_master_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisTambahans()
    {
        return $this->hasMany(TVendorTeknisTambahan::className(), ['p_master_region_id' => 'p_master_region_id']);
    }
}
