<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_undangan".
 *
 * @property integer $t_undangan_id
 * @property string $no_undangan
 * @property string $waktu_kirim
 * @property string $tujuan
 * @property integer $user_id
 * @property string $subjek
 * @property string $pesan
 *
 * @property User $user
 */
class TUndangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_undangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_undangan', 'tujuan', 'subjek', 'pesan'], 'string'],
            [['waktu_kirim'], 'safe'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_undangan_id' => 'Undangan ID',
            'no_undangan' => 'No Undangan',
            'waktu_kirim' => 'Waktu Kirim',
            'tujuan' => 'Tujuan',
            'user_id' => 'User ID',
            'subjek' => 'Subjek',
            'pesan' => 'Pesan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
