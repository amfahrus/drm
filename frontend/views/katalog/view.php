<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKomoditiHarga */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Katalog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">

  <div class="col-md-4">

      <div class="panel panel-default">
        <div class="panel-heading">Pencarian</div>
        <div class="panel-body">
          <?= $this->render('_search', [
              'model' => $searchModel,
          ]) ?>
        </div>
      </div>

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#barang" aria-controls="barang" role="tab" data-toggle="tab">Barang</a></li>
        <li role="presentation"><a href="#jasa" aria-controls="jasa" role="tab" data-toggle="tab">Jasa</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="barang">
          <div class="list-group">
            <?php
              foreach($barang as $item){
                echo '<a href="'.Url::base().'/katalog/barang/'.$item->p_master_comodity_id.'" class="list-group-item">
                  <span class="badge">'.$item->count.'</span>
                  '.$item->comodity_name.'
                </a>';
              }
            ?>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="jasa">
          <div class="list-group">
            <?php
              foreach($jasa as $row){
                echo '<a href="'.Url::base().'/katalog/jasa/'.$row->p_master_comodity_id.'" class="list-group-item">
                  <span class="badge">'.$row->count.'</span>
                  '.$row->comodity_name.'
                </a>';
              }
            ?>
          </div>
        </div>
      </div>
  </div>

  <div class="col-md-8">

    <div class="panel panel-default">
      <div class="panel-heading">
          <h1><?= Html::encode($this->title) ?></h1>
      </div>
      <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
              [
                  'attribute'=>'tVendorCompany.name',
                  'label' => 'Vendor',
                  'format'=>'raw',
                  'value'=> $model->tVendorCompany->prefix.' '.$model->tVendorCompany->name.' '.$model->tVendorCompany->sufix,
              ],
              'pMasterComodity.comodity_name',
              'nama',
              'merk',
              'sumber',
              'pMasterPemasok.tipe_pemasok',
              'area',
              'unit',
              [
                  'attribute'=>'lampiran',
                  'format'=>'raw',
                  'value'=> $model->lampiran ? Html::img('@web/uploads/'.$model->lampiran, ['class' => 'img-responsive img-thumbnail']) : '',
              ],
            ],
        ]) ?>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
          <h1>Riwayat Harga</h1>
      </div>
      <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProviderHarga,
            'filterModel' => $searchModelHarga,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                 'attribute' => 'pMasterCurrency',
                 'label' => 'Valuta',
                 'value' => 'pMasterCurrency.currency_code'
                ],
                'harga_satuan',
                'start_date',
                'masih_berlaku:boolean',
            ],
        ]); ?>
      </div>
    </div>

  </div>

</div>
