<?php
namespace backend\components;

use yii\base\Widget;
use yii\helpers\Html;

class DataRekananWidget extends Widget
{
    public $id;
    public $route;
    public $controller;

    public function init()
    {
        parent::init();
        if ($this->route === null) {
            $this->route = 'drm/data-index';
        }
    }

    public function run()
    {
        return $this->render('DataRekananWidget',['id' => $this->id,'route' => $this->route,'controller' => $this->controller]);
    }
}
