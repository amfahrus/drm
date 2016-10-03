<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TUndangan */

$this->title = 'Kirim Undangan';
$this->params['breadcrumbs'][] = ['label' => 'Undangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tundangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
