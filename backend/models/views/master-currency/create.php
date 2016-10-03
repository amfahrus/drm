<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCurrency */

$this->title = 'Tambah Mata Uang';
$this->params['breadcrumbs'][] = ['label' => 'Mata Uang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-currency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
