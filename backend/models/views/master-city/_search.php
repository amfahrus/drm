<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmaster-city-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_master_city_id') ?>

    <?= $form->field($model, 'p_master_region_id') ?>

    <?= $form->field($model, 'city_code') ?>

    <?= $form->field($model, 'city_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
