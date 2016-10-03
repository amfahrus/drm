<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_sdm".
 *
 * @property integer $t_vendor_sdm_id
 * @property integer $t_vendor_company_id
 * @property string $nama
 * @property string $pendidikan
 * @property string $keahlian
 * @property string $pengalaman
 * @property integer $umur
 * @property string $status
 * @property string $kewarganegaraan
 * @property integer $is_utama
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorCompany $tVendorCompany
 */
class TVendorSdm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_sdm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'umur', 'is_utama', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['nama', 'pendidikan', 'keahlian', 'pengalaman', 'status', 'kewarganegaraan', 'lampiran'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['umur', 'nama', 'pendidikan', 'keahlian', 'pengalaman', 'status', 'kewarganegaraan', 'create_user', 'update_user'], 'required'],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_sdm_id' => 'Vendor Sdm ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'nama' => 'Nama',
            'pendidikan' => 'Pendidikan',
            'keahlian' => 'Keahlian',
            'pengalaman' => 'Pengalaman',
            'umur' => 'Umur',
            'status' => 'Status',
            'kewarganegaraan' => 'Kewarganegaraan',
            'is_utama' => 'Is Utama',
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
