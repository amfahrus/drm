<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "p_master_category".
 *
 * @property integer $p_master_catagory_id
 * @property string $category_name
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property TCompanyCategory[] $tCompanyCategories
 */
class PMasterCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_master_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'string'],
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
            'p_master_catagory_id' => 'Catagory ID',
            'category_name' => 'Tipe Perusahaan',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTCompanyCategories()
    {
        return $this->hasMany(TCompanyCategory::className(), ['p_master_category_id' => 'p_master_catagory_id']);
    }
}
