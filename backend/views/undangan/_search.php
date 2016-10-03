<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TUndanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tundangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_undangan') ?>

    <?= $form->field($model, 'waktu_kirim') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'subjek') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
