<?php

namespace backend\controllers;

use Yii;
use backend\models\PMasterRegion;
use backend\models\PMasterCity;
use backend\models\PMasterCitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MasterCityController implements the CRUD actions for PMasterCity model.
 */
class MasterCityController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PMasterCity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PMasterCitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PMasterCity model.
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
     * Creates a new PMasterCity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PMasterCity();
        $region = ArrayHelper::map(PMasterRegion::find()->all(),'p_master_region_id','region_name');
        if ($model->load(Yii::$app->request->post())) {
            $model->p_master_region_id = $_POST['PMasterCity']['p_master_region_id'];
            $model->city_code = $_POST['PMasterCity']['city_code'];
            $model->city_name = $_POST['PMasterCity']['city_name'];
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->p_master_city_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'region' => $region,
            ]);
        }
    }

    /**
     * Updates an existing PMasterCity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $region = ArrayHelper::map(PMasterRegion::find()->all(),'p_master_region_id','region_name');
        if ($model->load(Yii::$app->request->post())) {
            $model->p_master_region_id = $_POST['PMasterCity']['p_master_region_id'];
            $model->city_code = $_POST['PMasterCity']['city_code'];
            $model->city_name = $_POST['PMasterCity']['city_name'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['view', 'id' => $model->p_master_city_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'region' => $region,
            ]);
        }
    }

    /**
     * Deletes an existing PMasterCity model.
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
     * Finds the PMasterCity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PMasterCity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PMasterCity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
