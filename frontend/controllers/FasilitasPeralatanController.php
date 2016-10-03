<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorTeknisAlat;
use frontend\models\TVendorTeknisAlatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * FasilitasPeralatanController implements the CRUD actions for TVendorTeknisAlat model.
 */
class FasilitasPeralatanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['frontend'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TVendorTeknisAlat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TVendorTeknisAlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisAlat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TVendorTeknisAlat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TVendorTeknisAlat();
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->p_master_jenis_alat_id = $_POST['TVendorTeknisAlat']['p_master_jenis_alat_id'];
            $model->nama = $_POST['TVendorTeknisAlat']['nama'];
            $model->merk = $_POST['TVendorTeknisAlat']['merk'];
            $model->spesifikasi = $_POST['TVendorTeknisAlat']['spesifikasi'];
            $model->kondisi = $_POST['TVendorTeknisAlat']['kondisi'];
            $model->kuantitas = $_POST['TVendorTeknisAlat']['kuantitas'];
            $model->tahun = $_POST['TVendorTeknisAlat']['tahun'];
            $model->lokasi_sekarang = $_POST['TVendorTeknisAlat']['lokasi_sekarang'];
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();

            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_alat_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TVendorTeknisAlat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->p_master_jenis_alat_id = $_POST['TVendorTeknisAlat']['p_master_jenis_alat_id'];
            $model->nama = $_POST['TVendorTeknisAlat']['nama'];
            $model->merk = $_POST['TVendorTeknisAlat']['merk'];
            $model->spesifikasi = $_POST['TVendorTeknisAlat']['spesifikasi'];
            $model->kondisi = $_POST['TVendorTeknisAlat']['kondisi'];
            $model->kuantitas = $_POST['TVendorTeknisAlat']['kuantitas'];
            $model->tahun = $_POST['TVendorTeknisAlat']['tahun'];
            $model->lokasi_sekarang = $_POST['TVendorTeknisAlat']['lokasi_sekarang'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            
            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_alat_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TVendorTeknisAlat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TVendorTeknisAlat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisAlat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVendorTeknisAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
