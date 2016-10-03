<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_legal_akta".
 *
 * @property integer $t_vendor_legal_akta_id
 * @property integer $t_vendor_company_id
 * @property string $nomor
 * @property string $jenis
 * @property string $tanggal_pembuatan
 * @property string $nama_notaris
 * @property string $alamat_notaris
 * @property string $tanggal_pengesahan
 * @property string $tanggal_berita
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorCompany $tVendorCompany
 */
class TVendorLegalAkta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_legal_akta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['nomor', 'jenis', 'nama_notaris', 'alamat_notaris'], 'string'],
            [['tanggal_pembuatan', 'tanggal_pengesahan', 'tanggal_berita', 'create_date', 'update_date'], 'safe'],
            [['nomor', 'jenis', 'nama_notaris', 'alamat_notaris','tanggal_pembuatan', 'tanggal_pengesahan', 'tanggal_berita','create_user', 'update_user'], 'required'],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_legal_akta_id' => 'Vendor Legal Akta ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'nomor' => 'Nomor',
            'jenis' => 'Jenis',
            'tanggal_pembuatan' => 'Tanggal Pembuatan',
            'nama_notaris' => 'Nama Notaris',
            'alamat_notaris' => 'Alamat Notaris',
            'tanggal_pengesahan' => 'Tanggal Pengesahan',
            'tanggal_berita' => 'Tanggal Berita',
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
