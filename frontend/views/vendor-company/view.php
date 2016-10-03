<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Json;
use mdm\admin\AnimateAsset;
use yii\web\YiiAsset;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorCompany */
AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $assign->getItems($model->t_vendor_company_id)
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';

$this->title = 'Nama Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Utama', 'url' => ['data-vendor/data-utama']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>

<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-company-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_vendor_company_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prefix',
            'name',
            'sufix',
        ],
    ]) ?>
    <label>Tipe Perusahaan</label>
    <div class="row">
        <div class="col-sm-5">
            <input class="form-control search" data-target="avaliable"
                   placeholder="Search for avaliable">
            <select multiple size="20" class="form-control list" data-target="avaliable"></select>
        </div>
        <div class="col-sm-1">
            <br><br>
            <?= Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->t_vendor_company_id], [
                'class' => 'btn btn-success btn-assign',
                'data-target' => 'avaliable',
                'title' => 'Assign'
            ]) ?><br><br>
            <?= Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->t_vendor_company_id], [
                'class' => 'btn btn-danger btn-assign',
                'data-target' => 'assigned',
                'title' => 'Remove'
            ]) ?>
        </div>
        <div class="col-sm-5">
            <input class="form-control search" data-target="assigned"
                   placeholder="Search for assigned">
            <select multiple size="20" class="form-control list" data-target="assigned"></select>
        </div>
    </div>
  </div>
</div>
