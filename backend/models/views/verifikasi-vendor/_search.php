<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TVerifikasiVendorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tverifikasi-vendor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_verifikasi_vendor_id') ?>

    <?= $form->field($model, 't_vendor_company_id') ?>

    <?= $form->field($model, 'status_nama_perusahaan') ?>

    <?= $form->field($model, 'keterangan_nama_perusahaan') ?>

    <?= $form->field($model, 'status_alamat_perusahaan') ?>

    <?php // echo $form->field($model, 'keterangan_alamat_perusahaan') ?>

    <?php // echo $form->field($model, 'status_akta_pendirian') ?>

    <?php // echo $form->field($model, 'keterangan_akta_pendirian') ?>

    <?php // echo $form->field($model, 'status_nama_pengurus') ?>

    <?php // echo $form->field($model, 'keterangan_nama_pengurus') ?>

    <?php // echo $form->field($model, 'status_alamat_pengurus') ?>

    <?php // echo $form->field($model, 'keterangan_alamat_pengurus') ?>

    <?php // echo $form->field($model, 'status_nama_pemilik') ?>

    <?php // echo $form->field($model, 'keterangan_nama_pemilik') ?>

    <?php // echo $form->field($model, 'status_alamat_pemilik') ?>

    <?php // echo $form->field($model, 'keterangan_alamat_pemilik') ?>

    <?php // echo $form->field($model, 'status_npwp') ?>

    <?php // echo $form->field($model, 'keterangan_npwp') ?>

    <?php // echo $form->field($model, 'status_sp_pkp') ?>

    <?php // echo $form->field($model, 'keterangan_sp_pkp') ?>

    <?php // echo $form->field($model, 'status_siup') ?>

    <?php // echo $form->field($model, 'keterangan_siup') ?>

    <?php // echo $form->field($model, 'status_siujk') ?>

    <?php // echo $form->field($model, 'keterangan_siujk') ?>

    <?php // echo $form->field($model, 'status_sbu') ?>

    <?php // echo $form->field($model, 'keterangan_sbu') ?>

    <?php // echo $form->field($model, 'status_ijin_domisili') ?>

    <?php // echo $form->field($model, 'keterangan_ijin_domisili') ?>

    <?php // echo $form->field($model, 'status_tdu_tdp') ?>

    <?php // echo $form->field($model, 'keterangan_tdu_tdp') ?>

    <?php // echo $form->field($model, 'status_asosiasi') ?>

    <?php // echo $form->field($model, 'keterangan_asosiasi') ?>

    <?php // echo $form->field($model, 'status_iso_9001') ?>

    <?php // echo $form->field($model, 'keterangan_iso_9001') ?>

    <?php // echo $form->field($model, 'status_ohsas_18001') ?>

    <?php // echo $form->field($model, 'keterangan_ohsas_18001') ?>

    <?php // echo $form->field($model, 'status_iso_14001') ?>

    <?php // echo $form->field($model, 'keterangan_iso_14001') ?>

    <?php // echo $form->field($model, 'status_pengalaman_kerja') ?>

    <?php // echo $form->field($model, 'keterangan_pengalaman_kerja') ?>

    <?php // echo $form->field($model, 'status_barang_jasa') ?>

    <?php // echo $form->field($model, 'keterangan_barang_jasa') ?>

    <?php // echo $form->field($model, 'status_tenaga_ahli') ?>

    <?php // echo $form->field($model, 'keterangan_tenaga_ahli') ?>

    <?php // echo $form->field($model, 'status_daftar_alat') ?>

    <?php // echo $form->field($model, 'keterangan_daftar_alat') ?>

    <?php // echo $form->field($model, 'rekomendasi') ?>

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
