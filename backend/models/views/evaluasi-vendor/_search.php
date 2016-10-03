<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TEvaluasiVendorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tevaluasi-vendor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_evaluasi_vendor_id') ?>

    <?= $form->field($model, 't_vendor_company_id') ?>

    <?= $form->field($model, 'nilai_ketersediaan') ?>

    <?= $form->field($model, 'catatan_ketersediaan') ?>

    <?= $form->field($model, 'nilai_work_instruction') ?>

    <?php // echo $form->field($model, 'catatan_work_instruction') ?>

    <?php // echo $form->field($model, 'nilai_ketepatan_waktu') ?>

    <?php // echo $form->field($model, 'catatan_ketepatan_waktu') ?>

    <?php // echo $form->field($model, 'nilai_nc_produk') ?>

    <?php // echo $form->field($model, 'catatan_nc_produk') ?>

    <?php // echo $form->field($model, 'nilai_dampak_lingkungan') ?>

    <?php // echo $form->field($model, 'catatan_dampak_lingkungan') ?>

    <?php // echo $form->field($model, 'nilai_pemenuhan_peraturan') ?>

    <?php // echo $form->field($model, 'catatan_pemenuhan_peraturan') ?>

    <?php // echo $form->field($model, 'nilai_kecelakaan_kerja') ?>

    <?php // echo $form->field($model, 'catatan_kecelakaan_kerja') ?>

    <?php // echo $form->field($model, 'nilai_hilang_jam_kerja') ?>

    <?php // echo $form->field($model, 'catatan_hilang_jam_kerja') ?>

    <?php // echo $form->field($model, 'hasil_penilaian') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 't_vendor_teknis_komoditi_id') ?>

    <?php // echo $form->field($model, 'create_user') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_user') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
