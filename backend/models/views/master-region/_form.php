<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterRegion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmaster-region-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_master_country_id')->dropdownList($country) ?>

    <?= $form->field($model, 'region_code')->textInput() ?>

    <?= $form->field($model, 'region_name')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
