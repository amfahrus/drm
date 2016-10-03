<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisAlat */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas/Peralatan', 'url' => ['data-vendor/fasilitas-peralatan']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-teknis-alat-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_vendor_teknis_alat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_vendor_teknis_alat_id], [
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
            'pMasterJenisAlat.jenis_alat',
            'nama',
            'merk',
            'spesifikasi',
            'kondisi',
            'kuantitas',
            'tahun',
            'lokasi_sekarang',
        ],
    ]) ?>

  </div>
</div>
