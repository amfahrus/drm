<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterCurrency;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKomoditiHarga */
/* @var $form yii\widgets\ActiveForm */
$currency = ArrayHelper::map(PMasterCurrency::find()->all(),'p_master_currency_id','currency_code');
?>

<div class="tvendor-komoditi-harga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_master_currency_id')->dropdownList($currency,['prompt'=>'-Pilih-']) ?>

    <?= $form->field($model, 'harga_satuan')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
