<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $login;
    public $password;
    public $role;
    public $rememberMe;

    public function rules()
    {
        return [
            [['login', 'password', 'role'], 'required'],
            ['rememberMe', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
            'role' => 'Роль',
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->login;
        $user->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user->role = $this->role;

        if ($user->save()) {
            return \Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
        }
    }
}