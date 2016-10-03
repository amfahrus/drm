<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TContactPerson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tcontact-person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cp_name')->textInput() ?>

    <?= $form->field($model, 'cp_position')->textInput() ?>

    <?= $form->field($model, 'cp_phone')->textInput() ?>

    <?= $form->field($model, 'cp_email')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
