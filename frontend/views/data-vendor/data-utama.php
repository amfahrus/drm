<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use frontend\components\DataRekananWidget;

$this->title = 'Data Utama';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['route' => Yii::$app->controller->route]);
?>
