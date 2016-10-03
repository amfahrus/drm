<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterRegion */
/* @var $form yii\widgets\ActiveForm */

$model->name= Yii::$app->user->identity->username;
?>

<div class="undangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'subject')->textInput() ?>

    <?= $form->field($model, 'text')->textArea(['rows' => '6'])  ?>

    <div class="form-group">
        <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
