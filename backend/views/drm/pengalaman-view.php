<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use backend\components\DataRekananWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TVendorCompanySiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'DRM', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tvendor-company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'prefix',
            'name',
            'sufix',
            [
             'attribute' => 'userdataInternal',
             'label' => 'Pendaftar',
             'value' => 'userdataInternal.fullname'
            ],

            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view}',
            ],
        ],
    ]); ?>
</div>

<div id="detail">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DataRekananWidget::widget(['id' => $id,'route' => Yii::$app->controller->route,'controller' => Yii::$app->controller->id]) ?>


        <?= DetailView::widget([
            'model' => $modelPengalaman,
            'attributes' => [

              'nama_pelanggan',
              'nama_proyek',
              'keterangan',
              'pMasterCurrency.currency_code',
              [
                  'attribute' =>'nilai_proyek',
                  'format'=>[
                      'decimal',
                      0,
                  ]
              ],
              'nomor_kontrak',
              'tanggal_mulai',
              'tanggal_selesai',
              'contact_person',
              'nomor_kontak',
            ],
        ]) ?>

</div>
