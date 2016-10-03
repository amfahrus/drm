<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "p_master_city".
 *
 * @property integer $p_master_city_id
 * @property integer $p_master_region_id
 * @property string $city_code
 * @property string $city_name
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterRegion $pMasterRegion
 * @property TVendorCompanySite[] $tVendorCompanySites
 * @property TVendorKepengurusan[] $tVendorKepengurusans
 * @property TVendorLegalDomisili[] $tVendorLegalDomisilis
 * @property TVendorLegalNpwp[] $tVendorLegalNpwps
 * @property TVendorTeknisTambahan[] $tVendorTeknisTambahans
 */
class PMasterCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_master_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_master_region_id', 'create_user', 'update_user'], 'integer'],
            [['city_code', 'city_name'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['create_user', 'update_user'], 'required'],
            [['p_master_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterRegion::className(), 'targetAttribute' => ['p_master_region_id' => 'p_master_region_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_master_city_id' => 'P Master City ID',
            'p_master_region_id' => 'P Master Region ID',
            'city_code' => 'City Code',
            'city_name' => 'City Name',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
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
    public function getTVendorCompanySites()
    {
        return $this->hasMany(TVendorCompanySite::className(), ['p_master_city_id' => 'p_master_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKepengurusans()
    {
        return $this->hasMany(TVendorKepengurusan::className(), ['p_master_city_id' => 'p_master_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalDomisilis()
    {
        return $this->hasMany(TVendorLegalDomisili::className(), ['p_master_city_id' => 'p_master_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalNpwps()
    {
        return $this->hasMany(TVendorLegalNpwp::className(), ['p_master_city_id' => 'p_master_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisTambahans()
    {
        return $this->hasMany(TVendorTeknisTambahan::className(), ['p_master_city_id' => 'p_master_city_id']);
    }
}
