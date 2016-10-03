<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_komoditi_harga".
 *
 * @property integer $t_vendor_komoditi_harga_id
 * @property integer $t_vendor_teknis_komoditi_id
 * @property integer $p_master_currency_id
 * @property double $harga_satuan
 * @property string $start_date
 * @property string $end_date
 * @property boolean $masih_berlaku
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCurrency $pMasterCurrency
 * @property TVendorTeknisKomoditi $tVendorTeknisKomoditi
 */
class TVendorKomoditiHarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_vendor_komoditi_harga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_teknis_komoditi_id', 'p_master_currency_id', 'harga_satuan'], 'required'],
            [['t_vendor_teknis_komoditi_id', 'p_master_currency_id', 'create_user', 'update_user'], 'integer'],
            [['harga_satuan'], 'number'],
            [['start_date', 'end_date', 'create_date', 'update_date'], 'safe'],
            [['masih_berlaku'], 'boolean'],
            [['p_master_currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCurrency::className(), 'targetAttribute' => ['p_master_currency_id' => 'p_master_currency_id']],
            [['t_vendor_teknis_komoditi_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorTeknisKomoditi::className(), 'targetAttribute' => ['t_vendor_teknis_komoditi_id' => 't_vendor_teknis_komoditi_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_komoditi_harga_id' => 'T Vendor Komoditi Harga ID',
            't_vendor_teknis_komoditi_id' => 'Komoditi',
            'p_master_currency_id' => 'Valuta',
            'harga_satuan' => 'Harga Satuan',
            'start_date' => 'Mulai Berlaku',
            'end_date' => 'Kadaluarsa',
            'masih_berlaku' => 'Masih Berlaku',
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
    public function getTVendorTeknisKomoditi()
    {
        return $this->hasOne(TVendorTeknisKomoditi::className(), ['t_vendor_teknis_komoditi_id' => 't_vendor_teknis_komoditi_id']);
    }
}
