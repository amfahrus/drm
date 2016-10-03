<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterComodity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmaster-comodity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comodity_code')->textInput() ?>

    <?= $form->field($model, 'comodity_name')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList(['1' => 'Barang', '2' => 'Jasa']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
