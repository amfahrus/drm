<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterRegion */

$this->title = 'Update Provinsi: ' . $model->p_master_region_id;
$this->params['breadcrumbs'][] = ['label' => 'Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_region_id, 'url' => ['view', 'id' => $model->p_master_region_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmaster-region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'country' => $country,
    ]) ?>

</div>
