<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorLegalSiup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-legal-siup-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'penerbit')->textInput() ?>

    <?= $form->field($model, 'nomor')->textInput() ?>

    <?= $form->field($model, 'jenis')->dropdownList(['Siup Kecil' => 'Siup Kecil', 'Siup Menengah' => 'Siup Menengah', 'Siup Besar' => 'Siup Menengah', 'Tbk' => 'Tbk']) ?>

    <?= $form->field($model, 'tanggal')->widget(
          DatePicker::className(), [
              'language' => 'en',
              'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayBtn' => true
            ]
          ]
        )
    ?>

    <?= $form->field($model, 'kadaluarsa')->widget(
          DatePicker::className(), [
              'language' => 'en',
              'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayBtn' => true
            ]
          ]
        )
    ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
