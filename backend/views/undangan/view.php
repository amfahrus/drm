<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TUndangan */

$this->title = $model->t_undangan_id;
$this->params['breadcrumbs'][] = ['label' => 'Undangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tundangan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_undangan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_undangan_id], [
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
            't_undangan_id',
            'user.username',
            'no_undangan',
            'waktu_kirim',
            'tujuan',
            'subjek',
            'pesan:ntext',
        ],
    ]) ?>

</div>
