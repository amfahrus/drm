<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterCurrency;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuLaporan */
/* @var $form yii\widgets\ActiveForm */
$currency = ArrayHelper::map(PMasterCurrency::find()->all(),'p_master_currency_id','currency_code');
?>

<div class="tvendor-keu-laporan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'tahun_laporan')->textInput() ?>

    <?= $form->field($model, 'jenis_laporan')->textInput() ?>

    <?= $form->field($model, 'fk_master_currency')->dropdownList($currency) ?>

    <?= $form->field($model, 'nilai_aset')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'hutang')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'pendapatan_kotor')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'laba_bersih')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
