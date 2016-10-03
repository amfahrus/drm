<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Country Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class Unit extends ActiveRecord
{
    public $parent_name;
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 't_unit';
	}

    /**
     * @inheritdoc
     */
    /*public static function primaryKey()
    {
        return ['unit_id'];
    }*/

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
			[['unit_name', 'unit_code', 'parent_name'], 'string'],
            [['unit_status', 'unit_parent'], 'integer'],
            [['parent_name'], 'in',
                'range' => static::find()->select(['unit_name'])->column(),
                'message' => 'Unit "{value}" not found.'],
            [['unit_id', 'unit_name', 'unit_code', 'unit_status'], 'required']
        ];
    }

}
