<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCity */

$this->title = 'Update Kota: ' . $model->p_master_city_id;
$this->params['breadcrumbs'][] = ['label' => 'Kota', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_city_id, 'url' => ['view', 'id' => $model->p_master_city_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmaster-city-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'region' => $region,
    ]) ?>

</div>
