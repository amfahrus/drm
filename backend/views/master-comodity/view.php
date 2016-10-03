<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterComodity */

$this->title = $model->p_master_comodity_id;
$this->params['breadcrumbs'][] = ['label' => 'Komoditi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-comodity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->p_master_comodity_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->p_master_comodity_id], [
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
            'p_master_comodity_id',
            'comodity_code',
            'comodity_name',
            'type',
        ],
    ]) ?>

</div>
