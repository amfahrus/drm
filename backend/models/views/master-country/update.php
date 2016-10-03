<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCountry */

$this->title = 'Update Negara: ' . $model->p_master_country_id;
$this->params['breadcrumbs'][] = ['label' => 'Negara', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_country_id, 'url' => ['view', 'id' => $model->p_master_country_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmaster-country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
