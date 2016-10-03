<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "p_master_country".
 *
 * @property integer $p_master_country_id
 * @property string $country_code
 * @property string $country_name
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterRegion[] $pMasterRegions
 * @property TVendorCompanySite[] $tVendorCompanySites
 * @property TVendorLegalDomisili[] $tVendorLegalDomisilis
 * @property TVendorTeknisTambahan[] $tVendorTeknisTambahans
 */
class PMasterCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_master_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code', 'country_name'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['create_user', 'update_user'], 'required'],
            [['create_user', 'update_user'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_master_country_id' => 'P Master Country ID',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterRegions()
    {
        return $this->hasMany(PMasterRegion::className(), ['p_master_country_id' => 'p_master_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompanySites()
    {
        return $this->hasMany(TVendorCompanySite::className(), ['p_master_country_id' => 'p_master_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalDomisilis()
    {
        return $this->hasMany(TVendorLegalDomisili::className(), ['p_master_country_id' => 'p_master_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisTambahans()
    {
        return $this->hasMany(TVendorTeknisTambahan::className(), ['p_master_country_id' => 'p_master_country_id']);
    }
}
