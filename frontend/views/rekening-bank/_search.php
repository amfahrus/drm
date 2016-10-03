<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuRekeningSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-keu-rekening-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_vendor_keu_rekening_id') ?>

    <?= $form->field($model, 't_vendor_company') ?>

    <?= $form->field($model, 'nomor') ?>

    <?= $form->field($model, 'pemegang') ?>

    <?= $form->field($model, 'nama_bank') ?>

    <?php // echo $form->field($model, 'cabang_bank') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'p_master_currency_id') ?>

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
