<?php

namespace backend\models;

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
 * @property string $lampiran
 * @property string $start_date
 * @property string $end_date
 * @property boolean $masih_berlaku
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 * @property integer $jenis
 *
 * @property TEvaluasiVendor[] $tEvaluasiVendors
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
            [['t_vendor_company_id', 'p_master_comodity_id', 'p_master_pemasok_id', 'p_master_currency_id', 'create_user', 'update_user', 'jenis'], 'integer'],
            [['nama', 'merk', 'sumber', 'area', 'unit', 'lampiran'], 'string'],
            [['harga_satuan'], 'number'],
            [['start_date', 'end_date', 'create_date', 'update_date'], 'safe'],
            [['masih_berlaku'], 'boolean'],
            [['p_master_comodity_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterComodity::className(), 'targetAttribute' => ['p_master_comodity_id' => 'p_master_comodity_id']],
            [['p_master_currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCurrency::className(), 'targetAttribute' => ['p_master_currency_id' => 'p_master_currency_id']],
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
            'p_master_comodity_id' => 'P Master Comodity ID',
            'nama' => 'Nama',
            'merk' => 'Merk',
            'sumber' => 'Sumber',
            'p_master_pemasok_id' => 'P Master Pemasok ID',
            'area' => 'Area',
            'harga_satuan' => 'Harga Satuan',
            'unit' => 'Unit',
            'p_master_currency_id' => 'P Master Currency ID',
            'lampiran' => 'Lampiran',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'masih_berlaku' => 'Masih Berlaku',
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
    public function getTEvaluasiVendors()
    {
        return $this->hasMany(TEvaluasiVendor::className(), ['t_vendor_teknis_komoditi_id' => 't_vendor_teknis_komoditi_id']);
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
    public function getPMasterCurrency()
    {
        return $this->hasOne(PMasterCurrency::className(), ['p_master_currency_id' => 'p_master_currency_id']);
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
}
