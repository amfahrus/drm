<?php

use yii\helpers\Html;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisPengalaman */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Pengalaman Proyek', 'url' => ['data-vendor/pengalaman-proyek']];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-teknis-pengalaman-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
  </div>
</div>
