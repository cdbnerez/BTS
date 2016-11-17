<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $user_lname
 * @property string $user_fname
 * @property string $user_type
 * @property string $user_pic
 * @property string $username
 * @property string $password
 *
 * @property Logs[] $logs
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_lname', 'user_fname', 'username', 'password'], 'required'],
            [['user_lname', 'user_fname'], 'string', 'max' => 50],
            [['user_type', 'user_pic', 'username', 'password'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_lname' => 'User Lname',
            'user_fname' => 'User Fname',
            'user_type' => 'User Type',
            'user_pic' => 'User Pic',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Logs::className(), ['User_id' => 'id']);
    }
}
