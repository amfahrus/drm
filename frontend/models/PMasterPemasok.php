<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "p_master_pemasok".
 *
 * @property integer $p_master_pemasok_id
 * @property string $tipe_pemasok
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorTeknisKomoditi[] $tVendorTeknisKomoditis
 */
class PMasterPemasok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_master_pemasok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipe_pemasok'], 'string'],
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
            'p_master_pemasok_id' => 'Pemasok ID',
            'tipe_pemasok' => 'Tipe Pemasok',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisKomoditis()
    {
        return $this->hasMany(TVendorTeknisKomoditi::className(), ['p_master_pemasok_id' => 'p_master_pemasok_id']);
    }
}
