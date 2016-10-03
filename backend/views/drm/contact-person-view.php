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



        <?= DetailView::widget([
            'model' => $modelContactPerson,
            'attributes' => [
                  'cp_name',
                  'cp_position',
                  'cp_phone',
                  'cp_email:email',
            ],
        ]) ?>

</div>
