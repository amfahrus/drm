<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "p_master_currency".
 *
 * @property integer $p_master_currency_id
 * @property string $currency_code
 * @property string $currency_desc
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorKeuLaporan[] $tVendorKeuLaporans
 * @property TVendorKeuRekening[] $tVendorKeuRekenings
 * @property TVendorTeknisPengalaman[] $tVendorTeknisPengalamen
 */
class PMasterCurrency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_master_currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_code', 'currency_desc'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['create_user', 'update_user'], 'required'],
            [['create_user', 'update_user'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_master_currency_id' => 'P Master Currency ID',
            'currency_code' => 'Currency Code',
            'currency_desc' => 'Currency Desc',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKeuLaporans()
    {
        return $this->hasMany(TVendorKeuLaporan::className(), ['fk_master_currency' => 'p_master_currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKeuRekenings()
    {
        return $this->hasMany(TVendorKeuRekening::className(), ['p_master_currency_id' => 'p_master_currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisPengalamen()
    {
        return $this->hasMany(TVendorTeknisPengalaman::className(), ['p_master_currency_id' => 'p_master_currency_id']);
    }
}
