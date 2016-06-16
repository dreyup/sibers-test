<?php
/**
 * Created by PhpStorm.
 * User: alexok
 * Date: 25.04.15
 * Time: 13:46
 */

namespace app\components\rbac;

use app\models\User;
use yii\rbac\Rule;

class UserRoleRule extends Rule
{
    public $name = 'userRole';

    public function execute($user, $item, $params)
    {

        if (!\Yii::$app->user->isGuest) {
            $role = \Yii::$app->user->identity->role;

            if ($item->name === 'admin') {
                return $role == User::ROLE_ADMIN;
            }
            elseif ($item->name === 'user') {
                return $role == User::ROLE_ADMIN;
            }
        }

        return false;
    }
}