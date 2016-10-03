<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisSertifikat */

$this->title = 'Detail Sertifikat';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sertifikasi', 'url' => ['data-vendor/sertifikasi']];
$this->params['breadcrumbs'][] = ['label' => 'Sertifikat', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-sertifikat-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_vendor_teknis_sertifikat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_vendor_teknis_sertifikat_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jenis',
            'sertifikat',
            'penerbit',
            'tanggal',
            'kadaluarsa',
            //'lampiran',
            [
                'attribute'=>'lampiran',
                'format'=>'raw',
                'value'=> $model->lampiran ? Html::a('download', ['uploads/'.$model->lampiran]) : '',
            ],
        ],
    ]) ?>

  </div>
</div>
