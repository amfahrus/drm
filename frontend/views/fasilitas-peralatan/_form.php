<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterJenisAlat;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorTeknisAlat */
/* @var $form yii\widgets\ActiveForm */
$kategori = ArrayHelper::map(PMasterJenisAlat::find()->all(),'p_master_jenis_alat_id','jenis_alat');
?>

<div class="tvendor-teknis-alat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_master_jenis_alat_id')->dropdownList($kategori) ?>

    <?= $form->field($model, 'nama')->textInput() ?>

    <?= $form->field($model, 'merk')->textInput() ?>

    <?= $form->field($model, 'spesifikasi')->textInput() ?>

    <?= $form->field($model, 'kondisi')->textInput() ?>

    <?= $form->field($model, 'kuantitas')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'lokasi_sekarang')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
