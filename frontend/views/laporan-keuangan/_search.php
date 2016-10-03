<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuLaporanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-keu-laporan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_vendor_keu_laporan_id') ?>

    <?= $form->field($model, 't_vendor_company_id') ?>

    <?= $form->field($model, 'tahun_laporan') ?>

    <?= $form->field($model, 'jenis_laporan') ?>

    <?= $form->field($model, 'fk_master_currency') ?>

    <?php // echo $form->field($model, 'nilai_aset') ?>

    <?php // echo $form->field($model, 'hutang') ?>

    <?php // echo $form->field($model, 'pendapatan_kotor') ?>

    <?php // echo $form->field($model, 'laba_bersih') ?>

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
