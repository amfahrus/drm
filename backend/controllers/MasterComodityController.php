<?php

namespace backend\controllers;

use Yii;
use backend\models\PMasterComodity;
use backend\models\PMasterComoditySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterComodityController implements the CRUD actions for PMasterComodity model.
 */
class MasterComodityController extends Controller
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
     * Lists all PMasterComodity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PMasterComoditySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PMasterComodity model.
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
     * Creates a new PMasterComodity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PMasterComodity();

        if ($model->load(Yii::$app->request->post())) {
    				$model->comodity_code = $_POST['PMasterComodity']['comodity_code'];
        		$model->comodity_name = $_POST['PMasterComodity']['comodity_name'];
        		$model->type = $_POST['PMasterComodity']['type'];
    				$model->create_user = Yii::$app->user->identity->id;
    				$model->update_user = Yii::$app->user->identity->id;
    				$model->save();
            return $this->redirect(['view', 'id' => $model->p_master_comodity_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PMasterComodity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
    				$model->comodity_code = $_POST['PMasterComodity']['comodity_code'];
        		$model->comodity_name = $_POST['PMasterComodity']['comodity_name'];
        		$model->type = $_POST['PMasterComodity']['type'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['view', 'id' => $model->p_master_comodity_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PMasterComodity model.
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
     * Finds the PMasterComodity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PMasterComodity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PMasterComodity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
