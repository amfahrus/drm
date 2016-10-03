<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TVendorTeknisKomoditiJasaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jasa';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Barang/Jasa', 'url' => ['data-vendor/barang-jasa']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-teknis-komoditi-index">
    <p>
        <?= Html::a('Tambah Jasa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
             'attribute' => 'pMasterComodity',
             'label' => 'Jenis Jasa',
             'value' => 'pMasterComodity.comodity_name'
            ],
            [
             'attribute' => 'pMasterPemasok',
             'label' => 'Tipe Pemasok',
             'value' => 'pMasterPemasok.tipe_pemasok'
            ],
            'nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>
