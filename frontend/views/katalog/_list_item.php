<?php
// YOUR_APP/views/list/_list_item.php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
//die(var_dump($model));
//die(print_r($model->tVendorKomoditiHarga));
?>
<style>
.img-thumbnail {
    width:160px;
    height:160px;
}
</style>
<div class="col-sm-4">

  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="text-muted"><small><?= $model->tVendorCompany->prefix.' '.$model->tVendorCompany->name.' '.$model->tVendorCompany->sufix ?></small></span>
    </div>

    <div class="panel-body">
        <?= Html::img('@web/uploads/'.$model->lampiran, ['class' => 'center-block img-responsive img-thumbnail', 'alt' => StringHelper::truncateWords($model->nama, 2)]) ?>

        <div class="caption">
          <h5><?= StringHelper::truncate($model->nama, 23); ?></h5>
        </div>
    </div>

    <div class="panel-footer">
      <a href="<?= Url::base().'/katalog/view/'.$model->t_vendor_teknis_komoditi_id ?>" class="btn btn-primary" role="button">Detail</a>
      <p class="pull-right text-muted"><?= number_format($model->tVendorKomoditiHarga->harga_satuan, 0, ',', '.'); ?></p>
    </div>
  </div>

</div>
