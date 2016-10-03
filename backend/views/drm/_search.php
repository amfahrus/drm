<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\PMasterCity;

/* @var $this yii\web\View */
/* @var $model backend\models\DrmSearch */
/* @var $form yii\widgets\ActiveForm */
$city = ArrayHelper::map(PMasterCity::find()->all(),'p_master_city_id','city_name');
?>

<div class="tvendor-company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tVendorCompanySites')->dropdownList($city,['id'=>'city','prompt'=>'-Pilih Kota-',])->label('Kota') ?>

    <?= $form->field($model, 'tVendorTeknisKomoditis')->label('Barang/Jasa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
