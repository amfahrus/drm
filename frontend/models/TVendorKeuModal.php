<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_keu_modal".
 *
 * @property integer $t_vendor_keu_modal_id
 * @property integer $t_vendor_company_id
 * @property string $klasifikasi
 * @property integer $valuta_dasar
 * @property double $nilai_dasar
 * @property integer $valuta_disetor
 * @property double $nilai_disetor
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCurrency $valutaDasar
 * @property PMasterCurrency $valutaDisetor
 * @property TVendorCompany $tVendorCompany
 */
class TVendorKeuModal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_vendor_keu_modal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'valuta_dasar', 'valuta_disetor', 'create_user', 'update_user'], 'integer'],
            [['klasifikasi'], 'string'],
            [['nilai_dasar', 'nilai_disetor'], 'number'],
            [['create_date', 'update_date'], 'safe'],
            [['valuta_dasar', 'valuta_disetor', 'nilai_dasar', 'nilai_disetor'], 'required'],
            [['valuta_dasar'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCurrency::className(), 'targetAttribute' => ['valuta_dasar' => 'p_master_currency_id']],
            [['valuta_disetor'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCurrency::className(), 'targetAttribute' => ['valuta_disetor' => 'p_master_currency_id']],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_keu_modal_id' => 'Vendor Keu Modal ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'klasifikasi' => 'Klasifikasi',
            'valuta_dasar' => 'Valuta Dasar',
            'nilai_dasar' => 'Nilai Dasar',
            'valuta_disetor' => 'Valuta Disetor',
            'nilai_disetor' => 'Nilai Disetor',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValutaDasar()
    {
        return $this->hasOne(PMasterCurrency::className(), ['p_master_currency_id' => 'valuta_dasar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValutaDisetor()
    {
        return $this->hasOne(PMasterCurrency::className(), ['p_master_currency_id' => 'valuta_disetor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
