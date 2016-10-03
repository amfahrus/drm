<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PMasterComodity */

$this->title = 'Tambah Komoditi';
$this->params['breadcrumbs'][] = ['label' => 'Komoditi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-comodity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
