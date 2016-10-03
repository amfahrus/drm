<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorLegalAktaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-legal-akta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_vendor_legal_akta_id') ?>

    <?= $form->field($model, 't_vendor_company_id') ?>

    <?= $form->field($model, 'nomor') ?>

    <?= $form->field($model, 'jenis') ?>

    <?= $form->field($model, 'tanggal_pembuatan') ?>

    <?php // echo $form->field($model, 'nama_notaris') ?>

    <?php // echo $form->field($model, 'alamat_notaris') ?>

    <?php // echo $form->field($model, 'tanggal_pengesahan') ?>

    <?php // echo $form->field($model, 'tanggal_berita') ?>

    <?php // echo $form->field($model, 'lampiran') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'create_user') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'update_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
