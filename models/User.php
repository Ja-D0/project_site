<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLES = [
        self::USER_ROLE => 'Пользователь',
        self::ADMIN_ROLE => 'Администратор',
    ];

    const USER_ROLE = 'user';
    const ADMIN_ROLE = 'admin';

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token])->limit(1)->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->limit(1)->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function tableName()
    {
        return 'user';
    }

    public function isAdmin()
    {
        return $this->role === self::ADMIN_ROLE;
    }

    public function isUser()
    {
        return $this->role === self::USER_ROLE;
    }

    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['authKey', 'access_token'], 'string']
        ];
    }

    public function fields()
    {
        return [
            'username'
        ];
    }
}
