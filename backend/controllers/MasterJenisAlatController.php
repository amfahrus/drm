<?php

namespace backend\controllers;

use Yii;
use backend\models\PMasterJenisAlat;
use backend\models\PMasterJenisAlatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterJenisAlatController implements the CRUD actions for PMasterJenisAlat model.
 */
class MasterJenisAlatController extends Controller
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
     * Lists all PMasterJenisAlat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PMasterJenisAlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PMasterJenisAlat model.
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
     * Creates a new PMasterJenisAlat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PMasterJenisAlat();

        if ($model->load(Yii::$app->request->post())) {
    				$model->jenis_alat = $_POST['PMasterJenisAlat']['jenis_alat'];
    				$model->create_user = Yii::$app->user->identity->id;
    				$model->update_user = Yii::$app->user->identity->id;
    				$model->save();
            return $this->redirect(['view', 'id' => $model->p_master_jenis_alat_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PMasterJenisAlat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
    				$model->jenis_alat = $_POST['PMasterJenisAlat']['jenis_alat'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['view', 'id' => $model->p_master_jenis_alat_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PMasterJenisAlat model.
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
     * Finds the PMasterJenisAlat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PMasterJenisAlat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PMasterJenisAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
