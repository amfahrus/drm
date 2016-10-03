<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCurrency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmaster-currency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'currency_code')->textInput() ?>

    <?= $form->field($model, 'currency_desc')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
