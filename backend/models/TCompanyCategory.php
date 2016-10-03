<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_company_category".
 *
 * @property integer $t_company_category_id
 * @property integer $t_vendor_company_id
 * @property integer $p_master_category_id
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCategory $pMasterCategory
 * @property TVendorCompany $tVendorCompany
 */
class TCompanyCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_company_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_category_id', 'create_user', 'update_user'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['create_user', 'update_user'], 'required'],
            [['p_master_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCategory::className(), 'targetAttribute' => ['p_master_category_id' => 'p_master_catagory_id']],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_company_category_id' => 'Company Category ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'p_master_category_id' => 'Master Category ID',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterCategory()
    {
        return $this->hasOne(PMasterCategory::className(), ['p_master_catagory_id' => 'p_master_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
