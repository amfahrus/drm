<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TEvaluasiVendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evaluasi Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tevaluasi-vendor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Evaluasi Vendor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
             'attribute' => 'tVendorCompany',
             'label' => 'Vendor',
             'value' => 'tVendorCompany.name'
            ],
            'nomor_kontrak',
            'hasil_penilaian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
