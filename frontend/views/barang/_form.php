<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterComodity;
use frontend\models\PMasterPemasok;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisKomoditi */
/* @var $form yii\widgets\ActiveForm */
$jenis_komoditi = ArrayHelper::map(PMasterComodity::find()->where(['=','type', 1])->all(),'p_master_comodity_id','comodity_name');
$tipe_pemasok = ArrayHelper::map(PMasterPemasok::find()->all(),'p_master_pemasok_id','tipe_pemasok');
?>

<div class="tvendor-teknis-komoditi-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'p_master_comodity_id')->dropdownList($jenis_komoditi,['prompt'=>'-Pilih-']) ?>

    <?= $form->field($model, 'nama')->textInput() ?>

    <?= $form->field($model, 'merk')->textInput() ?>

    <?= $form->field($model, 'sumber')->dropdownList(['Lokal' => 'Lokal', 'Import' => 'Import'],['prompt'=>'-Pilih-']) ?>

    <?= $form->field($model, 'p_master_pemasok_id')->dropdownList($tipe_pemasok,['prompt'=>'-Pilih-']) ?>

    <?= $form->field($model, 'area')->dropdownList(['Nasional' => 'Nasional', 'Lokal' => 'Lokal'],['prompt'=>'-Pilih-']) ?>

    <?= $form->field($model, 'unit')->textInput() ?>
    
    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
