<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_legal_siup".
 *
 * @property integer $t_vendor_legal_siup_id
 * @property integer $t_vendor_company_id
 * @property string $penerbit
 * @property string $nomor
 * @property string $jenis
 * @property string $tanggal
 * @property string $kadaluarsa
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorCompany $tVendorCompany
 */
class TVendorLegalSiup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_legal_siup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['penerbit', 'nomor', 'jenis', 'lampiran'], 'string'],
            [['tanggal', 'kadaluarsa', 'create_date', 'update_date'], 'safe'],
            [['penerbit', 'nomor', 'jenis', 'tanggal', 'kadaluarsa', 'create_user', 'update_user'], 'required'],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_legal_siup_id' => 'Vendor Legal Siup ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'penerbit' => 'Diterbitkan Oleh',
            'nomor' => 'Nomor',
            'jenis' => 'Jenis',
            'tanggal' => 'Tanggal',
            'kadaluarsa' => 'Kadaluarsa',
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
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
