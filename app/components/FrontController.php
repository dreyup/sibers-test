<?php

namespace app\components;

use yii\web\Controller;

/**
 * Class FrontController
 * @property $contentTitle
 */
class FrontController extends Controller
{
    private $_contentTitle;

    public function getContentTitle()
    {
        return $this->_contentTitle;
    }

    public function setContentTitle($value)
    {
        $this->getView()->title = sprintf('%s - %s', $value, \Yii::$app->name);
        $this->_contentTitle = $value;
    }
}