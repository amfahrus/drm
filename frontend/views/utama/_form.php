<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorSdm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-sdm-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput() ?>

    <?= $form->field($model, 'pendidikan')->textInput() ?>

    <?= $form->field($model, 'keahlian')->textInput() ?>

    <?= $form->field($model, 'pengalaman')->textInput() ?>

    <?= $form->field($model, 'umur')->textInput() ?>

    <?= $form->field($model, 'status')->dropdownList(['Permanen' => 'Permanen', 'Kontrak' => 'Kontrak', 'Outsourching' => 'Outsourching']) ?>

    <?= $form->field($model, 'kewarganegaraan')->dropdownList(['WNI' => 'WNI', 'TKA' => 'TKA']) ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
