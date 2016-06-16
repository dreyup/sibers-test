<?php
/**
 * Created by PhpStorm.
 * User: alexok
 * Date: 08.02.15
 * Time: 15:06
 */

namespace app\components;

use yii\base\Component;

/**
 * Class IniSettings
 * @package app\components
 * @version 1.01
 */
class IniSettings extends Component
{
    private $_iniParams;

    /**
     * Get values from protected/config.ini
     * @param string $section
     * @param string|null $param
     * @param mixed|null $defaultValue
     * @return mixed|null
     */
    public function get($section, $param=null, $defaultValue=null)
    {
        $this->loadIni();

        if ($param) {
            return isset($this->_iniParams[$section][$param]) ? $this->_iniParams[$section][$param] : $defaultValue;
        } else {
            return isset($this->_iniParams[$section]) ? $this->_iniParams[$section] : $defaultValue;
        }
    }

    private function loadIni()
    {
        $iniFile = \Yii::getAlias('@app/config.ini');

        if (!is_file($iniFile))
            throw new \Exception('config.ini not found');

        $this->_iniParams = parse_ini_file($iniFile, true);
    }
}
