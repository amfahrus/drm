<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorTeknisKomoditi;
use frontend\models\TVendorTeknisKomoditiJasaSearch;
use frontend\models\TVendorKomoditiHarga;
use frontend\models\TVendorKomoditiHargaSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * JasaController implements the CRUD actions for TVendorTeknisKomoditi model.
 */
class JasaController extends Controller
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
     * Lists all TVendorTeknisKomoditi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TVendorTeknisKomoditiJasaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisKomoditi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new TVendorKomoditiHargaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TVendorTeknisKomoditi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TVendorTeknisKomoditi();
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();
        //Set the path that the file will be uploaded to
        $path = Yii::getAlias('@frontend') .'/web/uploads/';

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->p_master_comodity_id = $_POST['TVendorTeknisKomoditi']['p_master_comodity_id'];
            $model->p_master_pemasok_id = $_POST['TVendorTeknisKomoditi']['p_master_pemasok_id'];
            $model->nama = $_POST['TVendorTeknisKomoditi']['nama'];
            $model->area = $_POST['TVendorTeknisKomoditi']['area'];
            $model->jenis = 2;
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            $model->lampiran = preg_replace('/[^A-Za-z0-9\-]/', '_', Yii::$app->user->identity->id.'_jasa_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension;
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();
            $model->uploadFile->saveAs($path . preg_replace('/[^A-Za-z0-9\-]/', '_',  Yii::$app->user->identity->id.'_jasa_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension);


            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_komoditi_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TVendorTeknisKomoditi model.
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
            $model->p_master_comodity_id = $_POST['TVendorTeknisKomoditi']['p_master_comodity_id'];
            $model->p_master_pemasok_id = $_POST['TVendorTeknisKomoditi']['p_master_pemasok_id'];
            $model->nama = $_POST['TVendorTeknisKomoditi']['nama'];
            $model->area = $_POST['TVendorTeknisKomoditi']['area'];
            $model->jenis = 2;
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            $model->lampiran = preg_replace('/[^A-Za-z0-9\-]/', '_', Yii::$app->user->identity->id.'_jasa_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension;
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            $model->uploadFile->saveAs($path . preg_replace('/[^A-Za-z0-9\-]/', '_',  Yii::$app->user->identity->id.'_jasa_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension);


            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_komoditi_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TVendorTeknisKomoditi model.
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
     * Finds the TVendorTeknisKomoditi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisKomoditi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVendorTeknisKomoditi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateHarga($id)
    {
        $harga = new TVendorKomoditiHarga();

        if ($harga->load(Yii::$app->request->post())) {
            $harga->t_vendor_teknis_komoditi_id = $id;
            $harga->p_master_currency_id = $_POST['TVendorKomoditiHarga']['p_master_currency_id'];
            $harga->harga_satuan = $_POST['TVendorKomoditiHarga']['harga_satuan'];
            $harga->masih_berlaku = true;
            $harga->create_user = Yii::$app->user->identity->id;
            $harga->update_user = Yii::$app->user->identity->id;
            if($harga->save() !== false){
              TVendorKomoditiHarga::updateAll(['masih_berlaku' => false], ['and',['!=', 't_vendor_komoditi_harga_id', $harga->t_vendor_komoditi_harga_id],['=', 't_vendor_teknis_komoditi_id', $id]]);
            }

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('create_harga', [
                'model' => $this->findModel($id),
                'harga' => $harga,
            ]);
        }
    }

    public function actionUpdateHarga($id,$hid)
    {
        $harga = $this->findModelHarga($hid);
        $model = $this->findModel($id);

        if ($harga->load(Yii::$app->request->post())) {
            $harga->t_vendor_teknis_komoditi_id = $id;
            $harga->p_master_currency_id = $_POST['TVendorKomoditiHarga']['p_master_currency_id'];
            $harga->harga_satuan = $_POST['TVendorKomoditiHarga']['harga_satuan'];
            $harga->masih_berlaku = true;
            $harga->update_user = Yii::$app->user->identity->id;
            $harga->update_date = date("Y-m-d H:i:s");
            if($harga->update() !== false){
              TVendorKomoditiHarga::updateAll(['masih_berlaku' => false], ['and',['!=', 't_vendor_komoditi_harga_id', $harga->t_vendor_komoditi_harga_id],['=', 't_vendor_teknis_komoditi_id', $id]]);
            }

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('update_harga', [
                'model' => $model,
                'harga' => $harga,
            ]);
        }
    }


   public function actionDeleteHarga($id,$hid)
   {
       $this->findModelHarga($hid)->delete();

       return $this->redirect(['view', 'id' => $id]);
   }

   protected function findModelHarga($id)
   {
       if (($model = TVendorKomoditiHarga::findOne($id)) !== null) {
           return $model;
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
}
