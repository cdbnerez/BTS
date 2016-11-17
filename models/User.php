<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


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
class User extends ActiveRecord implements \yii\web\IdentityInterface
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
            'user_lname' => "User's Last Name",
            'user_fname' => "User's First Name",
            'user_type' => 'Type of User',
            'user_pic' => 'Profile Picture',
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

    public static function findIdentity($id) {
    $user = self::find()
            ->where([
                "id" => $id
            ])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}

/**
 * @inheritdoc
 */
public static function findIdentityByAccessToken($token, $userType = null) {

    $user = self::find()
            ->where(["accessToken" => $token])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}

/**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
public static function findByUsername($username) {
    $user = self::find()
            ->where([
                "username" => $username
            ])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}

/**
 * @inheritdoc
 */
public function getId() {
    return $this->id;
}

/**
 * @inheritdoc
 */
public function getAuthKey() {
    return $this->authKey;
}

/**
 * @inheritdoc
 */
public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
}

/**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
public function validatePassword($password) {
    return $this->password === $password;
}


}
