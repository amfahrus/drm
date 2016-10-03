<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TUndangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tundangan-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'tujuan')->textInput() ?>

    <?= $form->field($model, 'subjek')->textInput() ?>

    <?= $form->field($model, 'pesan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kirim' : 'Kirim Ulang', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
