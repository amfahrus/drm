<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\web\YiiAsset;
use yii\helpers\Json;
use backend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\TVendorCompany */
$opts = Json::htmlEncode([
    'items' => $assign->getItems($model->t_vendor_company_id)
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';

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

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'prefix',
                'name',
                'sufix',
            ],
        ]) ?>

        <div class="row">
            <div class="col-sm-5">
                <input class="form-control search" data-target="assigned"
                       placeholder="Search for assigned">
                <select multiple size="20" class="form-control list" data-target="assigned"></select>
            </div>
        </div>
      </div>
    </div>

</div>
