<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PMasterCountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Negara';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Negara', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'p_master_country_id',
            'country_code',
            'country_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
