<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterRegionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmaster-region-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_master_region_id') ?>

    <?= $form->field($model, 'p_master_country_id') ?>

    <?= $form->field($model, 'region_code') ?>

    <?= $form->field($model, 'region_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
