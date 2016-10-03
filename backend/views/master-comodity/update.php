<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterComodity */

$this->title = 'Update Komoditi: ' . $model->p_master_comodity_id;
$this->params['breadcrumbs'][] = ['label' => 'Komoditi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_comodity_id, 'url' => ['view', 'id' => $model->p_master_comodity_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmaster-comodity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
