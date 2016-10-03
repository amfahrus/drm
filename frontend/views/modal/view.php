<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorKeuModal */

$this->title = 'Modal';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Keuangan', 'url' => ['data-vendor/data-keuangan']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-keu-modal-view">
    <p>
        <?= Html::a($model->isNewRecord ? 'Create' : 'Update', ['update', 'id' => $model->t_vendor_keu_modal_id], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
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
