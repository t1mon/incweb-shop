<?php

namespace frontend\controllers\cabinet;

use shop\entities\User\User;
use shop\repositories\NotFoundException;
use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'cabinet';

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $user = $this->findModel(\Yii::$app->user->id);

        return $this->render('index',['user'=>$user]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundException('The requested page does not exist.');
        }
    }
}