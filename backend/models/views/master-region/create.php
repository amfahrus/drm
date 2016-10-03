<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PMasterRegion */

$this->title = 'Tambah Provinsi';
$this->params['breadcrumbs'][] = ['label' => 'Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-region-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'country' => $country,
    ]) ?>

</div>
