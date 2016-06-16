<?php

namespace app\components;
use yii\filters\AccessControl;

/**
 * Class AdminController
 */
class AdminBaseController extends FrontController
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
}