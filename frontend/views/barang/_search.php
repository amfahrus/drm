<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisKomoditiBarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-teknis-komoditi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_vendor_teknis_komoditi_id') ?>

    <?= $form->field($model, 't_vendor_company_id') ?>

    <?= $form->field($model, 'p_master_comodity_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'merk') ?>

    <?php // echo $form->field($model, 'sumber') ?>

    <?php // echo $form->field($model, 'p_master_pemasok_id') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'harga_satuan') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'p_master_currency_id') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'masih_berlaku')->checkbox() ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'create_user') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'update_user') ?>

    <?php // echo $form->field($model, 'jenis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
