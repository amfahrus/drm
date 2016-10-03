<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prefix')->textInput(['placeholder' => "PT, CV, Lain-lain"]) ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => "Nama Perusahaan"]) ?>

    <?= $form->field($model, 'sufix')->textInput(['placeholder' => "Tbk, Bhd, Pte, Ltd, Lain-lain"]) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
