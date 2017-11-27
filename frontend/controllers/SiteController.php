<?php
namespace frontend\controllers;

use shop\helpers\JgrowlMessageHelper;
use shop\helpers\SendEmailHelper;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'home';
        return $this->render('index');
    }
/*
    public function actionMail()
    {
        //print_r(\Yii::$app->params['dkim']['privateKey']);
        $send = new SendEmailHelper(\Yii::$app->params['dkim']);
        echo $send->getPrivate();
        die();
        $this->layout = '@common/mail/layouts/html';
        return $this->render('@common/mail/auth/signup/confirm-html');
    } */

}
