<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterPemasok */

$this->title = 'Update Tipe Pemasok: ' . $model->p_master_pemasok_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Pemasok', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_pemasok_id, 'url' => ['view', 'id' => $model->p_master_pemasok_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmaster-pemasok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
