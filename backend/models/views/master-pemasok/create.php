<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PMasterPemasok */

$this->title = 'Tambah Tipe Pemasok';
$this->params['breadcrumbs'][] = ['label' => 'Tipe Pemasok', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-pemasok-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
