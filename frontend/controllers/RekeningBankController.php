<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorKeuRekening;
use frontend\models\TVendorKeuRekeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RekeningBankController implements the CRUD actions for TVendorKeuRekening model.
 */
class RekeningBankController extends Controller
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
     * Lists all TVendorKeuRekening models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TVendorKeuRekeningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorKeuRekening model.
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
     * Creates a new TVendorKeuRekening model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TVendorKeuRekening();
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();
        //Set the path that the file will be uploaded to
        $path = Yii::getAlias('@frontend') .'/web/uploads/';

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->nomor = $_POST['TVendorKeuRekening']['nomor'];
            $model->pemegang = $_POST['TVendorKeuRekening']['pemegang'];
            $model->nama_bank = $_POST['TVendorKeuRekening']['nama_bank'];
            $model->cabang_bank = $_POST['TVendorKeuRekening']['cabang_bank'];
            $model->alamat = $_POST['TVendorKeuRekening']['alamat'];
            $model->p_master_currency_id = $_POST['TVendorKeuRekening']['p_master_currency_id'];
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            $model->lampiran = preg_replace('/[^A-Za-z0-9\-]/', '_', Yii::$app->user->identity->id.'_rekening_bank_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension;
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();
            $model->uploadFile->saveAs($path . preg_replace('/[^A-Za-z0-9\-]/', '_',  Yii::$app->user->identity->id.'_rekening_bank_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension);

            return $this->redirect(['view', 'id' => $model->t_vendor_keu_rekening_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TVendorKeuRekening model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();
        //Set the path that the file will be uploaded to
        $path = Yii::getAlias('@frontend') .'/web/uploads/';

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->nomor = $_POST['TVendorKeuRekening']['nomor'];
            $model->pemegang = $_POST['TVendorKeuRekening']['pemegang'];
            $model->nama_bank = $_POST['TVendorKeuRekening']['nama_bank'];
            $model->cabang_bank = $_POST['TVendorKeuRekening']['cabang_bank'];
            $model->alamat = $_POST['TVendorKeuRekening']['alamat'];
            $model->p_master_currency_id = $_POST['TVendorKeuRekening']['p_master_currency_id'];
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            $model->lampiran = preg_replace('/[^A-Za-z0-9\-]/', '_', Yii::$app->user->identity->id.'_rekening_bank_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension;
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            $model->uploadFile->saveAs($path . preg_replace('/[^A-Za-z0-9\-]/', '_',  Yii::$app->user->identity->id.'_rekening_bank_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension);

            return $this->redirect(['view', 'id' => $model->t_vendor_keu_rekening_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TVendorKeuRekening model.
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
     * Finds the TVendorKeuRekening model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKeuRekening the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVendorKeuRekening::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
