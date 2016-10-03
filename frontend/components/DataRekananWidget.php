<?php
namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class DataRekananWidget extends Widget
{
    public $route;
    public $controller;

    public function init()
    {
        parent::init();
        if ($this->route === null) {
            $this->route = 'data-vendor/index';
        }
    }

    public function run()
    {
        return $this->render('DataRekananWidget',['route' => $this->route,'controller' => $this->controller]);
    }
}
