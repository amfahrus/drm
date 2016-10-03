<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorLegalAkta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvendor-legal-akta-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nomor')->textInput() ?>

    <?= $form->field($model, 'jenis')->dropdownList(['Pendirian' => 'Pendirian', 'Perubahan' => 'Perubahan']) ?>

    <?= $form->field($model, 'tanggal_pembuatan')->widget(
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

    <?= $form->field($model, 'nama_notaris')->textInput() ?>

    <?= $form->field($model, 'alamat_notaris')->textInput() ?>

    <?= $form->field($model, 'tanggal_pengesahan')->widget(
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

    <?= $form->field($model, 'tanggal_berita')->widget(
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
