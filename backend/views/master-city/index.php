<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PMasterCitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-city-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Kota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'p_master_city_id',
            'p_master_region_id',
            [
             'attribute' => 'pMasterRegion',
             'value' => 'pMasterRegion.region_name'
            ],
            'city_code',
            'city_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
