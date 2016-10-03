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
            'model' => $modelDewanDireksi,
            'attributes' => [
                'nama',
                'jabatan',
                'telpon',
                'email:email',
                'ktp',
                'npwp',
                'alamat',
                'pMasterCity.city_name',
                'pMasterRegion.region_name',
                'kode_pos',
                //'lampiran',
                [
                    'attribute'=>'lampiran',
                    'format'=>'raw',
                    'value'=> $modelDewanDireksi->lampiran ? Html::a('download', Url::to((isset($_SERVER["HTTPS"]) ? "https://" : "http://").Yii::$app->params['ipfrontend'].'/uploads/'.$modelDewanDireksi->lampiran, true)) : '',
                ],
            ],
        ]) ?>

</div>
