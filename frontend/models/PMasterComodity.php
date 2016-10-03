<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "p_master_comodity".
 *
 * @property integer $p_master_comodity_id
 * @property string $comodity_code
 * @property string $comodity_name
 * @property integer $type
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorTeknisKomoditi[] $tVendorTeknisKomoditis
 */
class PMasterComodity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $count;
    public static function tableName()
    {
        return 'p_master_comodity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comodity_code', 'comodity_name'], 'string'],
            [['count', 'type', 'create_user', 'update_user'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['create_user', 'update_user'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_master_comodity_id' => 'Comodity ID',
            'comodity_code' => 'Kode Komoditi',
            'comodity_name' => 'Nama Komoditi',
            'type' => 'Type',
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
        return $this->hasMany(TVendorTeknisKomoditi::className(), ['p_master_comodity_id' => 'p_master_comodity_id']);
    }
}
