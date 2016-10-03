<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterCurrency;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisPengalaman */
/* @var $form yii\widgets\ActiveForm */
$currency = ArrayHelper::map(PMasterCurrency::find()->all(),'p_master_currency_id','currency_code');
?>

<div class="tvendor-teknis-pengalaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pelanggan')->textInput() ?>

    <?= $form->field($model, 'nama_proyek')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput() ?>

    <?= $form->field($model, 'p_master_currency_id')->dropdownList($currency) ?>

    <?= $form->field($model, 'nilai_proyek')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'nomor_kontrak')->textInput() ?>

    <?= $form->field($model, 'tanggal_mulai')->widget(
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

    <?= $form->field($model, 'tanggal_selesai')->widget(
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

    <?= $form->field($model, 'contact_person')->textInput() ?>

    <?= $form->field($model, 'nomor_kontak')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
