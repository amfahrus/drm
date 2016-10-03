<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmaster-city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_master_region_id')->dropdownList($region) ?>

    <?= $form->field($model, 'city_code')->textInput() ?>

    <?= $form->field($model, 'city_name')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
