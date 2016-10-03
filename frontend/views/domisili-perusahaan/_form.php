<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterCountry;
use frontend\models\PMasterRegion;
use frontend\models\PMasterCity;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorLegalDomisili */
/* @var $form yii\widgets\ActiveForm */
$country = ArrayHelper::map(PMasterCountry::find()->all(),'p_master_country_id','country_name');
$region = ArrayHelper::map(PMasterRegion::find()->all(),'p_master_region_id','region_name');
$city = ArrayHelper::map(PMasterCity::find()->all(),'p_master_city_id','city_name');
?>

<div class="tvendor-legal-domisili-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'p_master_country_id')->dropdownList($country,
    ['onchange'=>'
      $.post( "'.Yii::$app->urlManager->createUrl('domisili-perusahaan/region-lists?id=').'"+$(this).val(), function( data ) {
        $( "select#region" ).html( data );
      });
      ']) ?>

    <?= $form->field($model, 'p_master_region_id')->dropdownList($region,['id'=>'region',
    'prompt'=>'-Pilih Provinsi-','onchange'=>'
      $.post( "'.Yii::$app->urlManager->createUrl('domisili-perusahaan/city-lists?id=').'"+$(this).val(), function( data ) {
        $( "select#city" ).html( data );
      });
      ']) ?>

    <?= $form->field($model, 'p_master_city_id')->dropdownList($city,['id'=>'city','prompt'=>'-Pilih Kota-',]) ?>

    <?= $form->field($model, 'domisili')->textInput() ?>

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

    <?= $form->field($model, 'alamat')->textInput() ?>

    <?= $form->field($model, 'kode_pos')->textInput() ?>

    <?= $form->field($model, 'telpon')->textInput() ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
