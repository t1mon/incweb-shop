<?php

namespace frontend\controllers\auth;

use common\auth\Identity;
use shop\useCases\auth\NetworkService;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\authclient\AuthAction;

class NetworkController extends Controller
{
    private $service;

    public function __construct($id, $module, NetworkService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function actions()
    {
        return [
            'auth' => [
                'class' => AuthAction::class,
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess(ClientInterface $client): void
    {
        $network = $client->getId();
        $attributes = $client->getUserAttributes();
        $identity = ArrayHelper::getValue($attributes, 'id');
        $accessToken = $client->getAccessToken()->getToken();

        try {
            $user = $this->service->auth($network, $identity, $accessToken, $attributes);
            Yii::$app->user->login(new Identity($user), Yii::$app->params['user.rememberMeDuration']);
        } catch (\Exception $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', "ERROR: Что-то пошло не так!");
        }
    }
}