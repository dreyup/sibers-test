<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $auth_key
 * @property string $created
 * @property string $name
 * @property string $lname
 * @property string $male_female
 */
class User extends ActiveRecord implements IdentityInterface
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    public $password_new;

    public static function tableName()
    {
        return 'user';
    }

    public static function roleValues()
    {
        return [
            'user'=>'Пользователь',
            'admin'=>'Администратор',
        ];
    }

    public static function polValues()
    {
        return [
            'Мужской'=>'Мужской',
            'Женский'=>'Женский',
        ];
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'unique'],
            [['password_new'], 'string', 'max'=>20],
            [['username', 'role', 'name', 'lname', 'male_female'], 'string', 'max'=>255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'password_new' => 'Пароль',
            'male_female' => 'Пол',
            'name' => 'Имя',
            'lname' => 'Фамилия',
            'role' => 'Права',
            'last_login' => 'Последний вход',
            'created' => 'Создан',
        ];
    }

    public function setPassword($value)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($value);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if (!empty($this->password_new)) {
                $this->setPassword($this->password_new);
            }

            return true;
        }
        return false;
    }
}
