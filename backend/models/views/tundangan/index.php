<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PMasterRegion */

$this->title = 'Kirim Undangan';
$this->params['breadcrumbs'][] = ['label' => 'Undangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="undangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('send', [
        'model' => $model,
    ]) ?>

</div>
