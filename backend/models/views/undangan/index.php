<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterRegion */

$this->title = 'Undangan';
$this->params['breadcrumbs'][] = ['label' => 'Undangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="undangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Kirim Undangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_undangan',
            [
             'attribute' => 'user',
             'value' => 'user.username'
            ],
            'waktu_kirim',
            'tujuan',
            'subjek',

            ['class' => 'yii\grid\ActionColumn',
              /*'template' => '{download} {view} {update} {delete}',
              'buttons' => [
                  'download' => function ($url) {
                      return Html::a(
                          '<span class="glyphicon glyphicon-arrow-download"></span>',
                          $url,
                          [
                              'title' => 'Download',
                              'data-pjax' => '0',
                          ]
                      );
                  },
                ],*/
            ],
        ],
    ]); ?>

</div>
