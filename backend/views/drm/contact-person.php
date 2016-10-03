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

<div id="detail" class="tvendor-contact-person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DataRekananWidget::widget(['id' => $id,'route' => Yii::$app->controller->route,'controller' => Yii::$app->controller->id]) ?>


    <div class="panel panel-info">
      <div class="panel-body tvendor-company-view">

        <?= GridView::widget([
            'dataProvider' => $dataProviderContactPerson,
            //'filterModel' => $searchModelContactPerson,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'cp_name',
                'cp_position',
                'cp_phone',
                'cp_email:email',

                [
                  'class' => 'yii\grid\ActionColumn',
                  'template' => '{view-site}',
                  'buttons' => [
                    'view-site' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                    'title' => Yii::t('app', 'View Contact Person'),
                        ]);
                    },
                  ],
                  'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view-site') {
                        $url ='contact-person-view?id='.$model->t_vendor_company_id.'&sid='.$model->t_contact_person_id.'#detail';
                        return $url;
                    }
                  }
                ],
            ],
        ]); ?>

      </div>
    </div>

</div>
