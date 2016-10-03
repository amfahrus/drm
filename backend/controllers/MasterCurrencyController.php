<?php

namespace backend\controllers;

use Yii;
use backend\models\PMasterCurrency;
use backend\models\PMasterCurrencySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterCurrencyController implements the CRUD actions for PMasterCurrency model.
 */
class MasterCurrencyController extends Controller
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
     * Lists all PMasterCurrency models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PMasterCurrencySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PMasterCurrency model.
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
     * Creates a new PMasterCurrency model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PMasterCurrency();

        if ($model->load(Yii::$app->request->post())) {
    				$model->currency_code = $_POST['PMasterCurrency']['currency_code'];
        		$model->currency_desc = $_POST['PMasterCurrency']['currency_desc'];
    				$model->create_user = Yii::$app->user->identity->id;
    				$model->update_user = Yii::$app->user->identity->id;
    				$model->save();
            return $this->redirect(['view', 'id' => $model->p_master_currency_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PMasterCurrency model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
    				$model->currency_code = $_POST['PMasterCurrency']['currency_code'];
        		$model->currency_desc = $_POST['PMasterCurrency']['currency_desc'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['view', 'id' => $model->p_master_currency_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PMasterCurrency model.
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
     * Finds the PMasterCurrency model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PMasterCurrency the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PMasterCurrency::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
