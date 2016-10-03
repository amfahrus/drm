<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorTeknisPengalaman;
use frontend\models\TVendorTeknisPengalamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PengalamanProyekController implements the CRUD actions for TVendorTeknisPengalaman model.
 */
class PengalamanProyekController extends Controller
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
     * Lists all TVendorTeknisPengalaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TVendorTeknisPengalamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisPengalaman model.
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
     * Creates a new TVendorTeknisPengalaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TVendorTeknisPengalaman();
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->nama_pelanggan = $_POST['TVendorTeknisPengalaman']['nama_pelanggan'];
            $model->nama_proyek = $_POST['TVendorTeknisPengalaman']['nama_proyek'];
            $model->keterangan = $_POST['TVendorTeknisPengalaman']['keterangan'];
            $model->p_master_currency_id = $_POST['TVendorTeknisPengalaman']['p_master_currency_id'];
            $model->nilai_proyek = $_POST['TVendorTeknisPengalaman']['nilai_proyek'];
            $model->nomor_kontrak = $_POST['TVendorTeknisPengalaman']['nomor_kontrak'];
            $model->tanggal_mulai = $_POST['TVendorTeknisPengalaman']['tanggal_mulai'];
            $model->tanggal_selesai = $_POST['TVendorTeknisPengalaman']['tanggal_selesai'];
            $model->contact_person = $_POST['TVendorTeknisPengalaman']['contact_person'];
            $model->nomor_kontak = $_POST['TVendorTeknisPengalaman']['nomor_kontak'];
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();

            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_pengalaman_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TVendorTeknisPengalaman model.
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
            $model->nama_pelanggan = $_POST['TVendorTeknisPengalaman']['nama_pelanggan'];
            $model->nama_proyek = $_POST['TVendorTeknisPengalaman']['nama_proyek'];
            $model->keterangan = $_POST['TVendorTeknisPengalaman']['keterangan'];
            $model->p_master_currency_id = $_POST['TVendorTeknisPengalaman']['p_master_currency_id'];
            $model->nilai_proyek = $_POST['TVendorTeknisPengalaman']['nilai_proyek'];
            $model->nomor_kontrak = $_POST['TVendorTeknisPengalaman']['nomor_kontrak'];
            $model->tanggal_mulai = $_POST['TVendorTeknisPengalaman']['tanggal_mulai'];
            $model->tanggal_selesai = $_POST['TVendorTeknisPengalaman']['tanggal_selesai'];
            $model->contact_person = $_POST['TVendorTeknisPengalaman']['contact_person'];
            $model->nomor_kontak = $_POST['TVendorTeknisPengalaman']['nomor_kontak'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            
            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_pengalaman_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TVendorTeknisPengalaman model.
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
     * Finds the TVendorTeknisPengalaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisPengalaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVendorTeknisPengalaman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
