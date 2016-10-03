<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorTeknisTambahan;
use frontend\models\TVendorTeknisTambahanSearch;
use frontend\models\PMasterCountry;
use frontend\models\PMasterRegion;
use frontend\models\PMasterCity;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DataTambahanController implements the CRUD actions for TVendorTeknisTambahan model.
 */
class DataTambahanController extends Controller
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
     * Lists all TVendorTeknisTambahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TVendorTeknisTambahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisTambahan model.
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
     * Creates a new TVendorTeknisTambahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TVendorTeknisTambahan();
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();
        //Set the path that the file will be uploaded to
        $path = Yii::getAlias('@frontend') .'/web/uploads/';

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->nama = $_POST['TVendorTeknisTambahan']['nama'];
            $model->alamat = $_POST['TVendorTeknisTambahan']['alamat'];
            $model->p_master_country_id = $_POST['TVendorTeknisTambahan']['p_master_country_id'];
            $model->p_master_region_id = $_POST['TVendorTeknisTambahan']['p_master_region_id'];
            $model->p_master_city_id = $_POST['TVendorTeknisTambahan']['p_master_city_id'];
            $model->kodepos = $_POST['TVendorTeknisTambahan']['kodepos'];
            $model->kualifikasi = $_POST['TVendorTeknisTambahan']['kualifikasi'];
            $model->hubungan_kerja = $_POST['TVendorTeknisTambahan']['hubungan_kerja'];
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            $model->lampiran = preg_replace('/[^A-Za-z0-9\-]/', '_', Yii::$app->user->identity->id.'_data_tambahan_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension;
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();
            $model->uploadFile->saveAs($path . preg_replace('/[^A-Za-z0-9\-]/', '_',  Yii::$app->user->identity->id.'_data_tambahan_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension);

            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_tambahan_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TVendorTeknisTambahan model.
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
            $model->nama = $_POST['TVendorTeknisTambahan']['nama'];
            $model->alamat = $_POST['TVendorTeknisTambahan']['alamat'];
            $model->p_master_country_id = $_POST['TVendorTeknisTambahan']['p_master_country_id'];
            $model->p_master_region_id = $_POST['TVendorTeknisTambahan']['p_master_region_id'];
            $model->p_master_city_id = $_POST['TVendorTeknisTambahan']['p_master_city_id'];
            $model->kodepos = $_POST['TVendorTeknisTambahan']['kodepos'];
            $model->kualifikasi = $_POST['TVendorTeknisTambahan']['kualifikasi'];
            $model->hubungan_kerja = $_POST['TVendorTeknisTambahan']['hubungan_kerja'];
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            $model->lampiran = preg_replace('/[^A-Za-z0-9\-]/', '_', Yii::$app->user->identity->id.'_data_tambahan_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension;
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            $model->uploadFile->saveAs($path . preg_replace('/[^A-Za-z0-9\-]/', '_',  Yii::$app->user->identity->id.'_data_tambahan_'.date('d m y h:i:s')) . '.' . $model->uploadFile->extension);

            return $this->redirect(['view', 'id' => $model->t_vendor_teknis_tambahan_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TVendorTeknisTambahan model.
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
     * Finds the TVendorTeknisTambahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisTambahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVendorTeknisTambahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRegionLists($id)
    {
        $countPosts = PMasterRegion::find()
            ->where(['p_master_country_id' => $id])
            ->count();

        $posts = PMasterRegion::find()
            ->where(['p_master_country_id' => $id])
            ->orderBy('region_name ASC')
            ->all();

        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->p_master_region_id."'>".$post->region_name."</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

    public function actionCityLists($id)
    {
        $countPosts = PMasterCity::find()
            ->where(['p_master_region_id' => $id])
            ->count();

        $posts = PMasterCity::find()
            ->where(['p_master_region_id' => $id])
            ->orderBy('city_name ASC')
            ->all();

        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->p_master_city_id."'>".$post->city_name."</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }
}
