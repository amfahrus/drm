<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PMasterPemasokSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipe Pemasok';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-pemasok-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Tipe Pemasok', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'p_master_pemasok_id',
            'tipe_pemasok',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
