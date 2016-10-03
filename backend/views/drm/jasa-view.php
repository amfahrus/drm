<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use backend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TVendorCompanySiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'DRM', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tvendor-company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'prefix',
            'name',
            'sufix',
            [
             'attribute' => 'userdataInternal',
             'label' => 'Pendaftar',
             'value' => 'userdataInternal.fullname'
            ],

            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view}',
            ],
        ],
    ]); ?>
</div>

<div id="detail">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DataRekananWidget::widget(['id' => $id,'route' => Yii::$app->controller->route,'controller' => Yii::$app->controller->id]) ?>


        <?= DetailView::widget([
            'model' => $modelJasa,
            'attributes' => [
                'pMasterComodity.comodity_name',
                'pMasterPemasok.tipe_pemasok',
                'area',
                'nama',
                //'lampiran',
                [
                    'attribute'=>'lampiran',
                    'format'=>'raw',
                    'value'=> $modelJasa->lampiran ? Html::img(Url::to((isset($_SERVER["HTTPS"]) ? "https://" : "http://").Yii::$app->params['ipfrontend'].'/uploads/'.$modelJasa->lampiran, true),['class' => 'img-responsive img-thumbnail']) : '',
                ],
            ],
        ]) ?>

</div>

<div id="harga">

    <h1>Riwayat Harga</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProviderHarga,
        //'filterModel' => $searchModelHarga,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
             'attribute' => 'tVendorTeknisKomoditi',
             'label' => 'Komoditi',
             'value' => 'tVendorTeknisKomoditi.nama'
            ],
            [
             'attribute' => 'pMasterCurrency',
             'label' => 'Valuta',
             'value' => 'pMasterCurrency.currency_code'
            ],
            [
                'attribute' =>'harga_satuan',
                'format'=>[
                    'decimal',
                    0,
                ]
            ],
            'start_date',
            // 'end_date',
            'masih_berlaku:boolean',

        ],
    ]); ?>

</div>
