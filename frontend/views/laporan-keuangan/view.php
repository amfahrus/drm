<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuLaporan */

$this->title = 'Detail Laporan Keuangan';
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
  <div class="panel-body tvendor-keu-laporan-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_vendor_keu_laporan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_vendor_keu_laporan_id], [
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
            'tahun_laporan',
            'jenis_laporan',
            'fkMasterCurrency.currency_code',
            'nilai_aset',
            'hutang',
            'pendapatan_kotor',
            'laba_bersih',
            [
                'attribute'=>'lampiran',
                'format'=>'raw',
                'value'=> $model->lampiran ? Html::a('download', ['uploads/'.$model->lampiran]) : '',
            ],
        ],
    ]) ?>

  </div>
</div>
