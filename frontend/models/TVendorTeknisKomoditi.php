<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_teknis_komoditi".
 *
 * @property integer $t_vendor_teknis_komoditi_id
 * @property integer $t_vendor_company_id
 * @property integer $p_master_comodity_id
 * @property string $nama
 * @property string $merk
 * @property string $sumber
 * @property integer $p_master_pemasok_id
 * @property string $area
 * @property double $harga_satuan
 * @property string $unit
 * @property integer $p_master_currency_id
 * @property string $gambar
 * @property string $start_date
 * @property string $end_date
 * @property boolean $masih_berlaku
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 * @property integer $jenis
 *
 * @property PMasterComodity $pMasterComodity
 * @property PMasterCurrency $pMasterCurrency
 * @property PMasterPemasok $pMasterPemasok
 * @property TVendorCompany $tVendorCompany
 */
class TVendorTeknisKomoditi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;
    //public $tVendorKomoditiHarga;

    public static function tableName()
    {
        return 't_vendor_teknis_komoditi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_comodity_id', 'p_master_pemasok_id', 'create_user', 'update_user', 'jenis'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'png'],
            [['nama', 'merk', 'sumber', 'area', 'unit', 'lampiran'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['p_master_comodity_id', 'p_master_pemasok_id', 'nama', 'area', 'create_user', 'update_user'], 'required'],
            [['p_master_comodity_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterComodity::className(), 'targetAttribute' => ['p_master_comodity_id' => 'p_master_comodity_id']],
            [['p_master_pemasok_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterPemasok::className(), 'targetAttribute' => ['p_master_pemasok_id' => 'p_master_pemasok_id']],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_teknis_komoditi_id' => 'T Vendor Teknis Komoditi ID',
            't_vendor_company_id' => 'T Vendor Company ID',
            'p_master_comodity_id' => 'Nama Komoditi',
            'nama' => 'Nama',
            'merk' => 'Merk',
            'sumber' => 'Sumber',
            'p_master_pemasok_id' => 'Tipe Pemasok',
            'area' => 'Area',
            'unit' => 'Unit',
            'lampiran' => 'Gambar',
            'uploadFile' => 'Gambar',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
            'jenis' => 'Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterComodity()
    {
        return $this->hasOne(PMasterComodity::className(), ['p_master_comodity_id' => 'p_master_comodity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterPemasok()
    {
        return $this->hasOne(PMasterPemasok::className(), ['p_master_pemasok_id' => 'p_master_pemasok_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKomoditiHarga()
    {
        return $this->hasOne(TVendorKomoditiHarga::className(), ['t_vendor_teknis_komoditi_id' => 't_vendor_teknis_komoditi_id']);
    }
}
