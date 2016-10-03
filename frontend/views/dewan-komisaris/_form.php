<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterRegion;
use frontend\models\PMasterCity;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKepengurusan */
/* @var $form yii\widgets\ActiveForm */
$region = ArrayHelper::map(PMasterRegion::find()->all(),'p_master_region_id','region_name');
$city = ArrayHelper::map(PMasterCity::find()->all(),'p_master_city_id','city_name');
?>

<div class="tvendor-kepengurusan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'p_master_region_id')->dropdownList($region,['id'=>'region',
    'prompt'=>'-Pilih Provinsi-','onchange'=>'
      $.post( "'.Yii::$app->urlManager->createUrl('domisili-perusahaan/city-lists?id=').'"+$(this).val(), function( data ) {
        $( "select#city" ).html( data );
      });
      ']) ?>

    <?= $form->field($model, 'p_master_city_id')->dropdownList($city,['id'=>'city','prompt'=>'-Pilih Kota-',]) ?>

    <?= $form->field($model, 'nama')->textInput() ?>

    <?= $form->field($model, 'jabatan')->textInput() ?>

    <?= $form->field($model, 'telpon')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'ktp')->textInput() ?>

    <?= $form->field($model, 'npwp')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput() ?>

    <?= $form->field($model, 'kode_pos')->textInput() ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
