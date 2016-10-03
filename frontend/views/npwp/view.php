<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorLegalNpwp */

$this->title = 'Detail NPWP';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Legal', 'url' => ['data-vendor/data-legal']];
$this->params['breadcrumbs'][] = ['label' => 'NPWP', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-legal-npwp-view">
      <p>
          <?= Html::a('Update', ['update', 'id' => $model->t_vendor_legal_npwp_id], ['class' => 'btn btn-primary']) ?>
          <?= Html::a('Delete', ['delete', 'id' => $model->t_vendor_legal_npwp_id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Are you sure you want to delete this item?',
                  'method' => 'post',
              ],
          ]) ?>
      </p>

      <?= DetailView::widget([
          'model' => $model,
          'attributes' => [
              'nomor',
              'alamat',
              'pMasterCity.city_name',
              'pMasterRegion.region_name',
              'kode_pos',
              [
                  'attribute'=>'status_pkp',
                  'format'=>'raw',
                  'value'=> $model->status_pkp ? 'Ya' : 'Tidak',
              ],
              'nomor_pkp',
              //'lampiran',
              [
                  'attribute'=>'lampiran',
                  'format'=>'raw',
                  'value'=> $model->lampiran ? Html::a('download', ['uploads/'.$model->lampiran]) : '',
              ],
          ],
      ]) ?>
  </div>
</div>
