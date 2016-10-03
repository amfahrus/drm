<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterCurrency;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuRekening */
/* @var $form yii\widgets\ActiveForm */
$currency = ArrayHelper::map(PMasterCurrency::find()->all(),'p_master_currency_id','currency_code');
?>

<div class="tvendor-keu-rekening-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nomor')->textInput() ?>

    <?= $form->field($model, 'pemegang')->textInput() ?>

    <?= $form->field($model, 'nama_bank')->textInput() ?>

    <?= $form->field($model, 'cabang_bank')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput() ?>

    <?= $form->field($model, 'p_master_currency_id')->dropdownList($currency) ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
