<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TEvaluasiVendor */

$this->title = 'Update Evaluasi Vendor: ' . $model->t_evaluasi_vendor_id;
$this->params['breadcrumbs'][] = ['label' => 'Evaluasi Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->t_evaluasi_vendor_id, 'url' => ['view', 'id' => $model->t_evaluasi_vendor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tevaluasi-vendor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
