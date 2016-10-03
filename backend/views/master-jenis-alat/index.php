<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PMasterJenisAlatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Alat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-jenis-alat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Jenis Alat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'p_master_jenis_alat_id',
            'jenis_alat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
