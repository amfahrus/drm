<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TVerifikasiVendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verifikasi Vendor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tverifikasi-vendor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
             'attribute' => 'tVendorCompany',
             'label' => 'Vendor',
             'value' => 'tVendorCompany.name'
            ],
            [
             'attribute' => 'rekomendasi',
             'label' => 'Rekomendasi',
             'value' => function($model, $key, $index)
              {
                  if($model->rekomendasi == 1)
                  {
                      return 'Lulus';
                  }
                  elseif(isset($model->rekomendasi))
                  {
                      return 'Tidak Lulus';
                  }
                  else
                  {
                      return 'Belum diverifikasi';
                  }
              },
            ],

            ['class' => 'yii\grid\ActionColumn',
              /*'template' => '{check} {view} {update} {delete}',
              'buttons' => [
                  'check' => function ($url) {
                      return Html::a(
                          '<span class="glyphicon glyphicon-check"></span>',
                          $url,
                          [
                              'title' => 'Verfifkasi',
                              'data-pjax' => '0',
                          ]
                      );
                  },
                ],*/
            ],
        ],
    ]); ?>
</div>
