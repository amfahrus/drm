<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisPengalaman */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Pengalaman Proyek', 'url' => ['data-vendor/pengalaman-proyek']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-teknis-pengalaman-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_vendor_teknis_pengalaman_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_vendor_teknis_pengalaman_id], [
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
            'nama_pelanggan',
            'nama_proyek',
            'keterangan',
            'pMasterCurrency.currency_code',
            'nilai_proyek',
            'nomor_kontrak',
            'tanggal_mulai',
            'tanggal_selesai',
            'contact_person',
            'nomor_kontak',
        ],
    ]) ?>

  </div>
</div>
