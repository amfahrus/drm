<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use frontend\components\DataRekananWidget;

$this->title = 'Data Rekanan';
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['route' => Yii::$app->controller->route]);
?>
