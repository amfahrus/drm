<?php

namespace backend\controllers;

use Yii;
use backend\models\PMasterCountry;
use backend\models\PMasterRegion;
use backend\models\PMasterRegionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MasterRegionController implements the CRUD actions for PMasterRegion model.
 */
class MasterRegionController extends Controller
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
     * Lists all PMasterRegion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PMasterRegionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PMasterRegion model.
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
     * Creates a new PMasterRegion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PMasterRegion();
        $country = ArrayHelper::map(PMasterCountry::find()->all(),'p_master_country_id','country_name');
        if ($model->load(Yii::$app->request->post())) {
            $model->p_master_country_id = $_POST['PMasterRegion']['p_master_country_id'];
            $model->region_code = $_POST['PMasterRegion']['region_code'];
            $model->region_name = $_POST['PMasterRegion']['region_name'];
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->p_master_region_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'country' => $country,
            ]);
        }
    }

    /**
     * Updates an existing PMasterRegion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $country = ArrayHelper::map(PMasterCountry::find()->all(),'p_master_country_id','country_name');
        if ($model->load(Yii::$app->request->post())) {
            $model->p_master_country_id = $_POST['PMasterRegion']['p_master_country_id'];
            $model->region_code = $_POST['PMasterRegion']['region_code'];
            $model->region_name = $_POST['PMasterRegion']['region_name'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['view', 'id' => $model->p_master_region_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'country' => $country,
            ]);
        }
    }

    /**
     * Deletes an existing PMasterRegion model.
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
     * Finds the PMasterRegion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PMasterRegion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PMasterRegion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
