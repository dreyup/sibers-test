<?php
/**
 * Created by PhpStorm.
 * User: alexok
 * Date: 08.02.15
 * Time: 14:59
 */

namespace app\components;

use yii\base\Component;

/**
 * Class AppEnv
 * Configure application from ini-file
 *
 * @package app\components
 * @version 1.01
 */
class AppEnv extends Component
{
    public function init()
    {
        parent::init();

        \Yii::$app->set('ini', [
            'class'=>'\app\components\IniSettings'
        ]);

        $this->configDb();
    }

    private function configDb()
    {
        $config = \Yii::$app->ini->get('db');

        if ($config) {
            $this->setDbConfig($config);
        }
    }

    private function setDbConfig($config)
    {
        if (!is_array($config))
            return;

        $config = (object) $config;

        \Yii::$app->set('db', [
            'class' => 'yii\db\Connection',
            'dsn' => "mysql:host={$config->host};dbname={$config->dbName}",
            'username' => $config->username,
            'password' => $config->password,
            'charset' => 'utf8',
            'emulatePrepare' => true,
        ]);
    }
}
