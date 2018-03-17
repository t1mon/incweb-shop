<?php

namespace shop\forms;

use Yii;
use yii\base\Model;

class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            [['verifyCode'],'required','message' =>'Вы же не робот?'],
            ['email', 'email'],
            [['verifyCode'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className()],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'name' => 'Имя',
            'email' => 'Ваш Email',
            'subject' => 'Тему письма',
            'body' => 'Сообщение'
        ];
    }
}
