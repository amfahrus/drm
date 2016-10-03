<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorCompanySite */

$this->title = 'Detail Alamat Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Utama', 'url' => ['data-vendor/data-utama']];
$this->params['breadcrumbs'][] = ['label' => 'Alamat Perusahaan', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>

<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-company-site-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->t_vendor_company_site_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->t_vendor_company_site_id], [
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
                'pMasterCountry.country_name',
                'pMasterRegion.region_name',
                'pMasterCity.city_name',
                'address',
                'postal_code',
                'phone',
                'fax',
                'email:email',
                'website',
            ],
        ]) ?>
  </div>
</div>
