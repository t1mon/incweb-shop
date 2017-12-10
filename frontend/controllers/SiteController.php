<?php
namespace frontend\controllers;

use shop\entities\User\User;
use shop\helpers\JgrowlMessageHelper;
use shop\helpers\SendEmailHelper;
use yii\filters\AccessControl;
use yii\helpers\Json;
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

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['rally'],
                'rules' => [
                    [
                        'actions' =>['rally'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function afterAction($action, $result)
    {
        if ($this->action->id == 'rally') {
            \Yii::$app->getUser()->setReturnUrl(\Yii::$app->request->url);
        }
        return parent::afterAction($action, $result);
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'home';
        return $this->render('index');
    }

    public function actionRally()
    {
        $user = User::findOne(\Yii::$app->user->id);
        if($user->networks) {
            $isGroupVK = false;
            $response = file_get_contents('https://api.vk.com/method/groups.isMember?group_id=132528657&user_id='.$user->networks[0]["identity"]);
            $response = Json::decode($response);
            if($response['response'])
                $isGroupVK = true;
            return $this->renderPartial('rally',['user'=>$user, 'isGroupVK'=>$isGroupVK]);
        }
        else {
            \Yii::$app->session->setFlash('error', 'Ваш аккаунт не связан с аккаунтом Вконтакте');
            return $this->redirect('/cabinet');
        }
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
