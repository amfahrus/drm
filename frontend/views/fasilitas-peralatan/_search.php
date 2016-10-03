<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisAlatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-teknis-alat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_vendor_teknis_alat_id') ?>

    <?= $form->field($model, 't_vendor_company_id') ?>

    <?= $form->field($model, 'p_master_jenis_alat_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'merk') ?>

    <?php // echo $form->field($model, 'spesifikasi') ?>

    <?php // echo $form->field($model, 'kondisi') ?>

    <?php // echo $form->field($model, 'kuantitas') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'lokasi_sekarang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
