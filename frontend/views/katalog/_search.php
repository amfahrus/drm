<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\models\TVendorCompany;
use backend\models\TVendorTeknisKomoditi;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKomoditiHargaBarangSearch */
/* @var $form yii\widgets\ActiveForm */
$vendor = TVendorCompany::find()
        ->select(['name as value', 'name as  label','name as id'])
        ->asArray()
        ->all();
$komoditi = TVendorTeknisKomoditi::find()
        ->select(['nama as value', 'nama as  label','nama as id'])
        ->asArray()
        ->all();
?>

<div class="tvendor-komoditi-harga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="form-group">
    <label class="control-label">Perusahaan</label>
    <?php
    echo AutoComplete::widget([
      'name' => 'Company',
      'id' => 'company',
      'options' => ['class' => 'form-control'],
      'clientOptions' => [
      'source' => $vendor,
      'autoFill'=>false,
      'matchContains'=>false,
      'mustMatch'=>true,
      'minLength'=>'2',
      'create' => new JsExpression("function( event, ui ) {
              $('#company').val('');
              $('#katalogsearch-tvendorcompany').val('');
              return false;
       }"),
      'search' => new JsExpression("function( event, ui ) {
              $('#katalogsearch-tvendorcompany').val('');
       }"),
      'select' => new JsExpression("function( event, ui ) {
          if (ui.item.id) {
            $('#company').val(ui.item.id);
            $('#katalogsearch-tvendorcompany').val(ui.item.id);
          } else {
            $('#company').val('');
            $('#katalogsearch-tvendorcompany').val('');
          }
          return false;
       }"),
      'change' => new JsExpression("function( event, ui ) {
          if (ui.item === null) {
              $('#company').val('');
              $('#katalogsearch-tvendorcompany').val('');
          }
       }")],
     ]);
     ?>
 </div>

 <div class="form-group">
     <label class="control-label">Komoditas</label>
     <?php
     echo AutoComplete::widget([
       'name' => 'Comodity',
       'id' => 'comodity',
       'options' => ['class' => 'form-control'],
       'clientOptions' => [
       'source' => $komoditi,
       'autoFill'=>false,
       'matchContains'=>false,
       'mustMatch'=>true,
       'minLength'=>'2',
       'create' => new JsExpression("function( event, ui ) {
               $('#comodity').val('');
               $('#katalogsearch-nama').val('');
               return false;
        }"),
       'search' => new JsExpression("function( event, ui ) {
               $('#katalogsearch-nama').val('');
        }"),
       'select' => new JsExpression("function( event, ui ) {
           if (ui.item.id) {
             $('#comodity').val(ui.item.id);
             $('#katalogsearch-nama').val(ui.item.id);
           } else {
             $('#comodity').val('');
             $('#katalogsearch-nama').val('');
           }
           return false;
        }"),
       'change' => new JsExpression("function( event, ui ) {
           if (ui.item === null) {
               $('#comodity').val('');
               $('#katalogsearch-nama').val('');
           }
        }")],
      ]);
      ?>
  </div>

     <?= Html::activeHiddenInput($model, 'tVendorCompany')?>

     <?= Html::activeHiddenInput($model, 'nama')?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
