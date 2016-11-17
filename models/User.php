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
 * @property string $user_username
 * @property string $user_pass
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
            [['user_lname', 'user_fname', 'user_username', 'user_pass'], 'required'],
            [['user_lname', 'user_fname'], 'string', 'max' => 50],
            [['user_type', 'user_pic', 'user_username', 'user_pass'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_lname' => "User's Last Name",
            'user_fname' => "User's First Name",
            'user_type' => 'User Type',
            'user_pic' => 'Profile Picture',
            'user_username' => 'Username',
            'user_pass' => 'Passowrd',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Logs::className(), ['User_id' => 'id']);
    }

	public function getUFullname()
	{
		return $this->user_lname . ', ' . $this->user_fname;
	}
}
