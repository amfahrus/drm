<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TEvaluasiVendor */

$this->title = $model->tVendorCompany->name;
$this->params['breadcrumbs'][] = ['label' => 'Evaluasi Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tevaluasi-vendor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_evaluasi_vendor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_evaluasi_vendor_id], [
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
            'tVendorCompany.name',
            'nomor_kontrak',
            'tVendorTeknisKomoditi.nama',
            'hasil_penilaian',
            'catatan',
        ],
    ]) ?>

</div>
