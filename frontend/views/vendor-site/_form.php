<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\PMasterCountry;
use frontend\models\PMasterRegion;
use frontend\models\PMasterCity;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorCompanySite */
/* @var $form yii\widgets\ActiveForm */
$country = ArrayHelper::map(PMasterCountry::find()->all(),'p_master_country_id','country_name');
$region = ArrayHelper::map(PMasterRegion::find()->all(),'p_master_region_id','region_name');
$city = ArrayHelper::map(PMasterCity::find()->all(),'p_master_city_id','city_name');
?>

<div class="tvendor-company-site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_master_country_id')->dropdownList($country,
    ['onchange'=>'
      $.post( "'.Yii::$app->urlManager->createUrl('vendor-site/region-lists?id=').'"+$(this).val(), function( data ) {
        $( "select#region" ).html( data );
      });
      ']) ?>

    <?= $form->field($model, 'p_master_region_id')->dropdownList($region,['id'=>'region',
    'prompt'=>'-Pilih Provinsi-','onchange'=>'
      $.post( "'.Yii::$app->urlManager->createUrl('vendor-site/city-lists?id=').'"+$(this).val(), function( data ) {
        $( "select#city" ).html( data );
      });
      ']) ?>

    <?= $form->field($model, 'p_master_city_id')->dropdownList($city,['id'=>'city','prompt'=>'-Pilih Kota-',]) ?>

    <?= $form->field($model, 'postal_code')->textInput() ?>

    <?= $form->field($model, 'address')->textArea(['rows' => '6']) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'fax')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'website')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
