<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_keu_rekening".
 *
 * @property integer $t_vendor_keu_rekening_id
 * @property integer $t_vendor_company_id
 * @property string $nomor
 * @property string $pemegang
 * @property string $nama_bank
 * @property string $cabang_bank
 * @property string $alamat
 * @property integer $p_master_currency_id
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCurrency $pMasterCurrency
 * @property TVendorCompany $tVendorCompany
 */
class TVendorKeuRekening extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_keu_rekening';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_currency_id', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['nomor', 'pemegang', 'nama_bank', 'cabang_bank', 'alamat', 'lampiran'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['nomor', 'pemegang', 'nama_bank', 'cabang_bank', 'alamat', 'p_master_currency_id', 'create_user', 'update_user'], 'required'],
            [['p_master_currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCurrency::className(), 'targetAttribute' => ['p_master_currency_id' => 'p_master_currency_id']],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_keu_rekening_id' => 'Vendor Keu Rekening ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'nomor' => 'Nomor Rekening',
            'pemegang' => 'Pemegang',
            'nama_bank' => 'Nama Bank',
            'cabang_bank' => 'Cabang Bank',
            'alamat' => 'Alamat',
            'p_master_currency_id' => 'Valuta',
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
    public function getPMasterCurrency()
    {
        return $this->hasOne(PMasterCurrency::className(), ['p_master_currency_id' => 'p_master_currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
