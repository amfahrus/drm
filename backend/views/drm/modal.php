<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use backend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\TVendorCompany */
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

        <?= DetailView::widget([
            'model' => $modelModal,
            'attributes' => [
                [
                    'attribute'=>'valutaDasar.currency_code',
                    'label' => 'Valuta Dasar',
                ],
                [
                    'attribute' =>'nilai_dasar',
                    'format'=>[
                        'decimal',
                        0,
                    ]
                ],
                [
                    'attribute'=>'valutaDisetor.currency_code',
                    'label' => 'Valuta Disetor',
                ],
                [
                    'attribute' =>'nilai_disetor',
                    'format'=>[
                        'decimal',
                        0,
                    ]
                ],
                'klasifikasi',
            ],
        ]) ?>

      </div>
    </div>

</div>
