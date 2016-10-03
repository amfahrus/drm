<?php

use yii\helpers\Html;
use frontend\components\DataRekananWidget;


/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorCompanySite */

$this->title = 'Tambah Alamat Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Utama', 'url' => ['data-vendor/data-utama']];
$this->params['breadcrumbs'][] = ['label' => 'Alamat Perusahaan', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>

<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-company-site-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>
