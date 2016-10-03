<?php

namespace frontend\controllers;

use Yii;
use frontend\models\KatalogSearch;
use frontend\models\TVendorCompany;
use frontend\models\TVendorTeknisKomoditi;
use frontend\models\TVendorTeknisKomoditiBarangSearch;
use frontend\models\TVendorTeknisKomoditiJasaSearch;
use frontend\models\TVendorKomoditiHarga;
use frontend\models\TVendorKomoditiHargaSearch;
use frontend\models\PMasterComodity;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

class KatalogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    public function actionIndex()
    {
        $searchModel = new KatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,false);
        $barang = $searchModel->barang();
        $jasa = $searchModel->jasa();

        return $this->render('index', [
          'searchModel' => $searchModel,
          'listDataProvider' => $dataProvider,
          'barang' => $barang,
          'jasa' => $jasa,
        ]);
    }

    public function actionBarang($id)
    {
        $searchModel = new KatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);
        $barang = $searchModel->barang();
        $jasa = $searchModel->jasa();

        return $this->render('index', [
          'searchModel' => $searchModel,
          'listDataProvider' => $dataProvider,
          'barang' => $barang,
          'jasa' => $jasa,
        ]);
    }

    public function actionJasa($id)
    {
        $searchModel = new KatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);
        $barang = $searchModel->barang();
        $jasa = $searchModel->jasa();

        return $this->render('index', [
          'searchModel' => $searchModel,
          'listDataProvider' => $dataProvider,
          'barang' => $barang,
          'jasa' => $jasa,
        ]);
    }

    public function actionView($id)
    {
        $searchModel = new KatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,false);
        $barang = $searchModel->barang();
        $jasa = $searchModel->jasa();

        $searchModelHarga = new TVendorKomoditiHargaSearch();
        $dataProviderHarga = $searchModelHarga->search(Yii::$app->request->queryParams,$id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'barang' => $barang,
            'jasa' => $jasa,
            'searchModelHarga' => $searchModelHarga,
            'dataProviderHarga' => $dataProviderHarga,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = TVendorTeknisKomoditi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
