<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterCategory */

$this->title = 'Update Master Category: ' . $model->p_master_catagory_id;
$this->params['breadcrumbs'][] = ['label' => 'Master Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_master_catagory_id, 'url' => ['view', 'id' => $model->p_master_catagory_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
