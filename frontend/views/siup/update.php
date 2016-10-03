<?php

use yii\helpers\Html;
use frontend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\TVendorLegalSiup */

$this->title = 'Update SIUP';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekanan', 'url' => ['data-vendor/index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Legal', 'url' => ['data-vendor/data-legal']];
$this->params['breadcrumbs'][] = ['label' => 'SIUP', 'url' => [Yii::$app->controller->id.'/index']];
$this->params['breadcrumbs'][] = $this->title;
echo DataRekananWidget::widget(['controller' => Yii::$app->controller->id]);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body tvendor-legal-siup-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
  </div>
</div>
