<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorCompanySite;
use frontend\models\TVendorCompanySiteSearch;
use frontend\models\PMasterCountry;
use frontend\models\PMasterRegion;
use frontend\models\PMasterCity;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * VendorSiteController implements the CRUD actions for TVendorCompanySite model.
 */
class VendorSiteController extends Controller
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
     * Lists all TVendorCompanySite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TVendorCompanySiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorCompanySite model.
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
     * Creates a new TVendorCompanySite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TVendorCompanySite();
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();

        if ($model->load(Yii::$app->request->post())) {
    				$model->t_vendor_company_id = $vendor->t_vendor_company_id;
    				$model->address = $_POST['TVendorCompanySite']['address'];
    				$model->p_master_city_id = $_POST['TVendorCompanySite']['p_master_city_id'];
    				$model->postal_code = $_POST['TVendorCompanySite']['postal_code'];
    				$model->p_master_region_id = $_POST['TVendorCompanySite']['p_master_region_id'];
    				$model->p_master_country_id = $_POST['TVendorCompanySite']['p_master_country_id'];
    				$model->phone = $_POST['TVendorCompanySite']['phone'];
    				$model->fax = $_POST['TVendorCompanySite']['fax'];
    				$model->email = $_POST['TVendorCompanySite']['email'];
    				$model->website = $_POST['TVendorCompanySite']['website'];
    				$model->create_user = Yii::$app->user->identity->id;
    				$model->update_user = Yii::$app->user->identity->id;
    				$model->save();
            return $this->redirect(['view', 'id' => $model->t_vendor_company_site_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TVendorCompanySite model.
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
            $model->address = $_POST['TVendorCompanySite']['address'];
            $model->p_master_city_id = $_POST['TVendorCompanySite']['p_master_city_id'];
            $model->postal_code = $_POST['TVendorCompanySite']['postal_code'];
            $model->p_master_region_id = $_POST['TVendorCompanySite']['p_master_region_id'];
            $model->p_master_country_id = $_POST['TVendorCompanySite']['p_master_country_id'];
            $model->phone = $_POST['TVendorCompanySite']['phone'];
            $model->fax = $_POST['TVendorCompanySite']['fax'];
            $model->email = $_POST['TVendorCompanySite']['email'];
            $model->website = $_POST['TVendorCompanySite']['website'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['view', 'id' => $model->t_vendor_company_site_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TVendorCompanySite model.
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
     * Finds the TVendorCompanySite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorCompanySite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVendorCompanySite::findOne($id)) !== null) {
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
