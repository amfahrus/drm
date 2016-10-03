<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterPemasok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmaster-pemasok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipe_pemasok')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
