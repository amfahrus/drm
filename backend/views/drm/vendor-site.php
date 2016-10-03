<?php

use yii\helpers\Html;
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

<div id="detail" class="tvendor-company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DataRekananWidget::widget(['id' => $id,'route' => Yii::$app->controller->route,'controller' => Yii::$app->controller->id]) ?>


    <div class="panel panel-info">
      <div class="panel-body tvendor-company-view">

        <?= GridView::widget([
            'dataProvider' => $dataProviderVendorSite,
            //'filterModel' => $searchModelVendorSite,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],


                'address',
                'postal_code',
                [
                 'attribute' => 'pMasterCity',
                 'label' => 'Kota',
                 'value' => 'pMasterCity.city_name'
                ],
                'phone',
                'email',

                [
                  'class' => 'yii\grid\ActionColumn',
                  'template' => '{view-site}',
                  'buttons' => [
                    'view-site' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                    'title' => Yii::t('app', 'View Site'),
                        ]);
                    },
                  ],
                  'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view-site') {
                        $url ='vendor-site-view?id='.$model->t_vendor_company_id.'&sid='.$model->t_vendor_company_site_id.'#detail';
                        return $url;
                    }
                  }
                ],
            ],
        ]); ?>

      </div>
    </div>

</div>
