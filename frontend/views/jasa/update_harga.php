<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisKomoditi */

$this->title = 'Detail Jasa';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Barang/Jasa', 'url' => ['data-vendor/barang-jasa']];
$this->params['breadcrumbs'][] = ['label' => 'Jasa', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-teknis-komoditi-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_vendor_teknis_komoditi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_vendor_teknis_komoditi_id], [
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
            'pMasterComodity.comodity_name',
            'pMasterPemasok.tipe_pemasok',
            'area',
            'nama',
            [
                'attribute'=>'lampiran',
                'format'=>'raw',
                'value'=> $model->lampiran ? Html::img('@web/uploads/'.$model->lampiran, ['class' => 'img-responsive img-thumbnail']) : '',
            ],
        ],
    ]) ?>

  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
      <h1>Update Harga Barang</h1>
  </div>
  <div class="panel-body tvendor-teknis-komoditi-update">

        <?= $this->render('_form_harga', [
            'model' => $harga,
        ]) ?>
  </div>
</div>
