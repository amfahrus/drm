<?php

use yii\helpers\Html;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKepengurusan */

$this->title = 'Update Dewan Direksi';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Pengurus Perusahaan', 'url' => ['data-vendor/pengurus-perusahaan']];
$this->params['breadcrumbs'][] = ['label' => 'Dewan Direksi', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-kepengurusan-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
  </div>
</div>
