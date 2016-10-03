<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\TUndangan;
use backend\models\TUndanganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UndanganController implements the CRUD actions for TUndangan model.
 */
class UndanganController extends Controller
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
     * Lists all TUndangan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TUndanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TUndangan model.
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
     * Creates a new TUndangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TUndangan();
        $signupLink = Html::a((isset($_SERVER["HTTPS"]) ? "https://" : "http://").Yii::$app->params['ipfrontend'].'/site/signup', Url::to((isset($_SERVER["HTTPS"]) ? "https://" : "http://").Yii::$app->params['ipfrontend'].'/site/signup', true));

        if ($model->load(Yii::$app->request->post())) {
            $model->tujuan = $_POST['TUndangan']['tujuan'];
            $model->subjek = $_POST['TUndangan']['subjek'];
            $model->pesan = $_POST['TUndangan']['pesan'];
            $model->user_id = Yii::$app->user->identity->id;
            if($model->save()){
              $no_undangan = str_pad($model->t_undangan_id, 4, '0', STR_PAD_LEFT).'-'.date("Y");
              $model->no_undangan = $no_undangan;
              $model->update();
            }

            /*Yii::$app->mailer->compose()
              ->setFrom('pengadaan@brantas-abipraya.co.id')
              //->setTo($model->tujuan)
              ->setTo('amfahrus@yahoo.co.id')
              ->setCc('wiz.stalker@gmail.com')
              ->setSubject($model->subjek.' ['.$model->no_undangan.']')
              //->setTextBody($model->pesan.'http://eproc.brantas-abipraya.co.id/vendor/register/'.$model->t_undangan_id)
              ->setHtmlBody('Nomor Undangan : <b>'.$model->no_undangan.'</b><br><br>'.$model->pesan.'<br><br>'.$signupLink)
              ->send();*/

            return $this->redirect(['view', 'id' => $model->t_undangan_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TUndangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $signupLink = Html::a((isset($_SERVER["HTTPS"]) ? "https://" : "http://").Yii::$app->params['ipfrontend'].'/site/signup', Url::to((isset($_SERVER["HTTPS"]) ? "https://" : "http://").Yii::$app->params['ipfrontend'].'/site/signup', true));

        if ($model->load(Yii::$app->request->post())) {
            $model->tujuan = $_POST['TUndangan']['tujuan'];
            $model->subjek = $_POST['TUndangan']['subjek'];
            $model->pesan = $_POST['TUndangan']['pesan'];
            $model->user_id = Yii::$app->user->identity->id;
            $model->waktu_kirim = date("Y-m-d H:i:s");
            $model->update();

            Yii::$app->mailer->compose()
              ->setFrom('pengadaan@brantas-abipraya.co.id')
              //->setTo($model->tujuan)
              ->setTo('amfahrus@yahoo.co.id')
              ->setCc('wiz.stalker@gmail.com')
              ->setSubject($model->subjek.' ['.$model->no_undangan.']')
              //->setTextBody($model->pesan.'http://eproc.brantas-abipraya.co.id/vendor/register/'.$model->t_undangan_id)
              ->setHtmlBody('Nomor Undangan : <b>'.$model->no_undangan.'</b><br><br>'.$model->pesan.'<br><br>'.$signupLink)
              ->send();

            return $this->redirect(['view', 'id' => $model->t_undangan_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TUndangan model.
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
     * Finds the TUndangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TUndangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TUndangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
