<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MasterCategory */

$this->title = 'Create Master Category';
$this->params['breadcrumbs'][] = ['label' => 'Master Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
