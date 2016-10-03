<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "p_master_jenis_alat".
 *
 * @property integer $p_master_jenis_alat_id
 * @property string $jenis_alat
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TVendorTeknisAlat[] $tVendorTeknisAlats
 */
class PMasterJenisAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_master_jenis_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_alat'], 'string'],
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
            'p_master_jenis_alat_id' => 'Jenis Alat ID',
            'jenis_alat' => 'Jenis Alat',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisAlats()
    {
        return $this->hasMany(TVendorTeknisAlat::className(), ['p_master_jenis_alat_id' => 'p_master_jenis_alat_id']);
    }
}
