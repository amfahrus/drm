<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_teknis_pengalaman".
 *
 * @property integer $t_vendor_teknis_pengalaman_id
 * @property integer $t_vendor_company_id
 * @property string $nama_pelanggan
 * @property string $nama_proyek
 * @property string $keterangan
 * @property integer $p_master_currency_id
 * @property double $nilai_proyek
 * @property string $nomor_kontrak
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $contact_person
 * @property string $nomor_kontak
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCurrency $pMasterCurrency
 * @property TVendorCompany $tVendorCompany
 */
class TVendorTeknisPengalaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_vendor_teknis_pengalaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_currency_id', 'create_user', 'update_user'], 'integer'],
            [['nama_pelanggan', 'nama_proyek', 'keterangan', 'nomor_kontrak', 'contact_person', 'nomor_kontak'], 'string'],
            [['nilai_proyek'], 'number'],
            [['tanggal_mulai', 'tanggal_selesai', 'create_date', 'update_date'], 'safe'],
            [['tanggal_mulai', 'tanggal_selesai', 'p_master_currency_id', 'nama_pelanggan', 'nama_proyek', 'keterangan', 'nomor_kontrak', 'contact_person', 'nilai_proyek', 'nomor_kontak', 'create_user', 'update_user'], 'required'],
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
            't_vendor_teknis_pengalaman_id' => 'Vendor Teknis Pengalaman ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'nama_pelanggan' => 'Nama Pelanggan',
            'nama_proyek' => 'Nama Proyek',
            'keterangan' => 'Keterangan',
            'p_master_currency_id' => 'Valuta',
            'nilai_proyek' => 'Nilai Proyek',
            'nomor_kontrak' => 'Nomor Kontrak',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'contact_person' => 'Contact Person',
            'nomor_kontak' => 'Nomor Kontak',
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
