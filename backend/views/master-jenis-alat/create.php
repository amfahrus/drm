<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PMasterJenisAlat */

$this->title = 'Tambah Jenis Alat';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Alat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmaster-jenis-alat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
