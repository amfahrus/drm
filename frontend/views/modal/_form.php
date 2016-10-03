<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterCurrency;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuModal */
/* @var $form yii\widgets\ActiveForm */
$currency = ArrayHelper::map(PMasterCurrency::find()->all(),'p_master_currency_id','currency_code');
?>

<div class="tvendor-keu-modal-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'valuta_dasar')->dropdownList($currency) ?>

    <?= $form->field($model, 'nilai_dasar')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'valuta_disetor')->dropdownList($currency) ?>

    <?= $form->field($model, 'nilai_disetor')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'klasifikasi')->dropdownList(['Besar' => 'Besar', 'Menengah' => 'Menengah', 'Kecil' => 'Kecil']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
