<?php

namespace app\controllers;

use app\components\AdminBaseController;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\HttpException;

class UserController extends AdminBaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update', 'index',],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query'=>User::find()
        ]);

        return $this->render('index', [
            'dataProvider'=>$dataProvider
        ]);
    }

    public function actionCreate()
    {
        return $this->actionUpdate(null);
    }

    public function actionUpdate($id)
    {
        if ($id === null) {
            $model = new User();
        } else {
            $model = $this->findModel($id);
        }

        if ($model->load($_POST) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Сохранено!');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model'=>$model
        ]);
    }

    public function actionRegister()
    {
        $model = new User();

        if ($model->load($_POST) && $model->validate()) {
            // Pre moderation
            $model->save(false);

            \Yii::$app->session->setFlash('success', 'Успешно зарегистрированы');
            return $this->redirect(Url::home());
        }

        return $this->render('register', [
            'model'=>$model
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return User
     * @throws HttpException
     */
    private function findModel($id)
    {
        $model = User::findOne($id);

        if (!$model)
            throw new HttpException(404);

        return $model;
    }
}
