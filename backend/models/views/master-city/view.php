<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterCity */

$this->title = $model->p_master_city_id;
$this->params['breadcrumbs'][] = ['label' => 'Kota', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-city-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->p_master_city_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->p_master_city_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'p_master_city_id',
            'p_master_region_id',
            'pMasterRegion.region_name',
            'city_code',
            'city_name',
        ],
    ]) ?>

</div>
