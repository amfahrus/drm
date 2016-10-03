<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisSertifikatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-teknis-sertifikat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_vendor_teknis_sertifikat_id') ?>

    <?= $form->field($model, 't_vendor_company_id') ?>

    <?= $form->field($model, 'sertifikat') ?>

    <?= $form->field($model, 'penerbit') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'kadaluarsa') ?>

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
