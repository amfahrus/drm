<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TVerifikasiVendor */

$this->title = 'Verifikasi Vendor: ' . $model->tVendorCompany->name;
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Vendor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tVendorCompany->name, 'url' => ['view', 'id' => $model->t_verifikasi_vendor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tverifikasi-vendor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          [
              'label'=>'Nama Vendor',
              'value'=> $model->tVendorCompany->prefix.' '.$model->tVendorCompany->name.' '.$model->tVendorCompany->sufix,
          ],

        ],
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
