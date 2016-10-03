<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_keu_laporan".
 *
 * @property integer $t_vendor_keu_laporan_id
 * @property integer $t_vendor_company_id
 * @property string $tahun_laporan
 * @property string $jenis_laporan
 * @property integer $fk_master_currency
 * @property double $nilai_aset
 * @property double $hutang
 * @property double $pendapatan_kotor
 * @property double $laba_bersih
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCurrency $fkMasterCurrency
 * @property TVendorCompany $tVendorCompany
 */
class TVendorKeuLaporan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_keu_laporan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'fk_master_currency', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['tahun_laporan', 'jenis_laporan', 'lampiran'], 'string'],
            [['nilai_aset', 'hutang', 'pendapatan_kotor', 'laba_bersih'], 'number'],
            [['create_date', 'update_date'], 'safe'],
            [['fk_master_currency', 'tahun_laporan', 'jenis_laporan', 'nilai_aset', 'hutang', 'pendapatan_kotor', 'laba_bersih', 'create_user', 'update_user'], 'required'],
            [['fk_master_currency'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCurrency::className(), 'targetAttribute' => ['fk_master_currency' => 'p_master_currency_id']],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_keu_laporan_id' => 'T Vendor Keu Laporan ID',
            't_vendor_company_id' => 'T Vendor Company ID',
            'tahun_laporan' => 'Tahun Laporan',
            'jenis_laporan' => 'Jenis Laporan',
            'fk_master_currency' => 'Valuta',
            'nilai_aset' => 'Nilai Aset',
            'hutang' => 'Hutang',
            'pendapatan_kotor' => 'Pendapatan Kotor',
            'laba_bersih' => 'Laba Bersih',
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
    public function getFkMasterCurrency()
    {
        return $this->hasOne(PMasterCurrency::className(), ['p_master_currency_id' => 'fk_master_currency']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
