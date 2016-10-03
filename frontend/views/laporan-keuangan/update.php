<?php

use yii\helpers\Html;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuLaporan */

$this->title = 'Update Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Keuangan', 'url' => ['data-vendor/data-keuangan']];
$this->params['breadcrumbs'][] = ['label' => 'Laporan Keuangan', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-keu-laporan-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
  </div>
</div>
