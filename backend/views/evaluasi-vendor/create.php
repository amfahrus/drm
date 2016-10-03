<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TEvaluasiVendor */

$this->title = 'Create Evaluasi Vendor';
$this->params['breadcrumbs'][] = ['label' => 'Evaluasi Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tevaluasi-vendor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
