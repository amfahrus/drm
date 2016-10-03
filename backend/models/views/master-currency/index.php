<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PMasterCurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Uang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-currency-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Mata Uang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'p_master_currency_id',
            'currency_code',
            'currency_desc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
