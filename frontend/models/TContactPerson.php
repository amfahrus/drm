<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_contact_person".
 *
 * @property integer $t_contact_person_id
 * @property integer $t_vendor_company_id
 * @property string $cp_name
 * @property string $cp_position
 * @property string $cp_phone
 * @property string $cp_email
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorCompany $tVendorCompany
 */
class TContactPerson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_contact_person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'create_user', 'update_user'], 'integer'],
            [['cp_name', 'cp_position', 'cp_phone', 'cp_email'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['cp_name', 'cp_position', 'cp_phone', 'cp_email', 'create_user', 'update_user'], 'required'],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_contact_person_id' => 'Contact Person ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'cp_name' => 'Nama',
            'cp_position' => 'Jabatan',
            'cp_phone' => 'Telpon',
            'cp_email' => 'Email',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
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
