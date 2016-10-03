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

<div id="detail">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DataRekananWidget::widget(['id' => $id,'route' => Yii::$app->controller->route,'controller' => Yii::$app->controller->id]) ?>


    <div class="panel panel-info">
      <div class="panel-body">

        <?= GridView::widget([
            'dataProvider' => $dataProviderDewanKomisaris,
            //'filterModel' => $searchModelDewanKomisaris,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama',
                'jabatan',
                'telpon',

                [
                  'class' => 'yii\grid\ActionColumn',
                  'template' => '{view-drm}',
                  'buttons' => [
                    'view-drm' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                    'title' => Yii::t('app', 'View'),
                        ]);
                    },
                  ],
                  'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view-drm') {
                        $url ='dewan-komisaris-view?id='.$model->t_vendor_company_id.'&sid='.$model->t_vendor_kepengurusan_id.'#detail';
                        return $url;
                    }
                  }
                ],
            ],
        ]); ?>

      </div>
    </div>

</div>
