<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DrmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DRM';
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
            // 'area',
            // 'referer',
            // 'create_date',
            // 'create_user',
            // 'update_date',
            // 'update_user',
            // 'no_undangan',

            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
