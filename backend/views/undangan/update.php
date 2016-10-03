<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TUndangan */

$this->title = 'Update Undangan: ' . $model->t_undangan_id;
$this->params['breadcrumbs'][] = ['label' => 'Undangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->t_undangan_id, 'url' => ['view', 'id' => $model->t_undangan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tundangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
