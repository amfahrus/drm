<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterJenisAlat */

$this->title = 'Update Jenis Alat: ' . $model->p_master_jenis_alat_id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Alat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_jenis_alat_id, 'url' => ['view', 'id' => $model->p_master_jenis_alat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmaster-jenis-alat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
