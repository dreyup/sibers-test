<?php
/**
 * Created by PhpStorm.
 * User: alexok
 * Date: 24.04.15
 * Time: 21:00
 */

namespace app\commands;


use app\components\rbac\UserRoleRule;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->getAuthManager();
        $auth->removeAll();

        //Enable handler
        $rule = new UserRoleRule();
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;

        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;

        //add Roles
        $auth->add($user);
        $auth->add($admin);
    }
}