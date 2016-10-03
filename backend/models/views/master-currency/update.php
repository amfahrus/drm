<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCurrency */

$this->title = 'Update Mata Uang: ' . $model->p_master_currency_id;
$this->params['breadcrumbs'][] = ['label' => 'Mata Uang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_currency_id, 'url' => ['view', 'id' => $model->p_master_currency_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmaster-currency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
