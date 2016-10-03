<?php

use yii\widgets\ListView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TVendorKomoditiHargaBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Katalog';
$this->params['breadcrumbs'][] = $this->title;
//die(var_dump($category));
?>
<div class="row">

  <div class="col-md-4">

  <div class="panel panel-default">
    <div class="panel-heading">Pencarian</div>
    <div class="panel-body">
      <?= $this->render('_search', [
          'model' => $searchModel,
      ]) ?>
    </div>
  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" <?= Yii::$app->controller->route == 'katalog/barang' ? 'class="active"' : '' ?>><a href="#barang" aria-controls="barang" role="tab" data-toggle="tab">Barang</a></li>
    <li role="presentation" <?= Yii::$app->controller->route == 'katalog/jasa' ? 'class="active"' : '' ?>><a href="#jasa" aria-controls="jasa" role="tab" data-toggle="tab">Jasa</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?= Yii::$app->controller->route == 'katalog/barang' ? 'active' : '' ?>" id="barang">
      <div class="list-group">
        <?php
          foreach($barang as $item){
            echo '<a href="'.Url::base().'/katalog/barang/'.$item->p_master_comodity_id.'" class="list-group-item">
              <span class="badge">'.$item->count.'</span>
              '.$item->comodity_name.'
            </a>';
          }
        ?>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane <?= Yii::$app->controller->route == 'katalog/jasa' ? 'active' : '' ?>" id="jasa">
      <div class="list-group">
        <?php
          foreach($jasa as $row){
            echo '<a href="'.Url::base().'/katalog/jasa/'.$row->p_master_comodity_id.'" class="list-group-item">
              <span class="badge">'.$row->count.'</span>
              '.$row->comodity_name.'
            </a>';
          }
        ?>
      </div>
    </div>
  </div>

  </div>

  <div class="col-md-8">
      <?= ListView::widget([
          'options' => [
              'tag' => 'div',
          ],
          'dataProvider' => $listDataProvider,
          'itemView' => function ($model, $key, $index, $widget) {
              $itemContent = $this->render('_list_item',['model' => $model]);

              return $itemContent;

              /* Or if you just want to display the list item only: */
              // return $this->render('_list_item',['model' => $model]);
          },
          'itemOptions' => [
              'tag' => false,
          ],
          'summary' => '',
          /* do not display {summary} */
          'layout' => '{sorter}{items}{pager}',
          //'layout' => '{items}{pager}',

          'sorter' => [
              'attributes' => [
                  'HargaSatuan',
                  'nama',
            ],
            'options' => [
                'class' => 'list-inline'
            ]
          ],

          'pager' => [
              'firstPageLabel' => 'First',
              'lastPageLabel' => 'Last',
              'maxButtonCount' => 4,
              'options' => [
                  'class' => 'pagination col-xs-12'
              ]
          ],

      ]);
      ?>
  </div>
</div>
