<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorKeuModal;
use frontend\models\TVendorKeuModalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ModalController implements the CRUD actions for TVendorKeuModal model.
 */
class ModalController extends Controller
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
        ];
    }

    /**
     * Lists all TVendorKeuModal models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('view', [
            'model' => $this->findModel(),
        ]);
    }

    /**
     * Updates an existing TVendorKeuModal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel();
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $vendor->t_vendor_company_id;
            $model->klasifikasi = $_POST['TVendorKeuModal']['klasifikasi'];
            $model->valuta_dasar = $_POST['TVendorKeuModal']['valuta_dasar'];
            $model->nilai_dasar = $_POST['TVendorKeuModal']['nilai_dasar'];
            $model->valuta_disetor = $_POST['TVendorKeuModal']['valuta_disetor'];
            $model->nilai_disetor = $_POST['TVendorKeuModal']['nilai_disetor'];
            if($model->isNewRecord){
                $model->create_user = Yii::$app->user->identity->id;
                $model->update_user = Yii::$app->user->identity->id;
                $model->save();
            } else {
                $model->update_user = Yii::$app->user->identity->id;
                $model->update_date = date("Y-m-d H:i:s");
                $model->update();
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the TVendorKeuModal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKeuModal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();
        $modal = TVendorKeuModal::find()->where(['=','t_vendor_company_id', $vendor->t_vendor_company_id])->one();

        if ($modal) {
            return $model = TVendorKeuModal::findOne($modal->t_vendor_keu_modal_id);
        } else {
            return $model = new TVendorKeuModal();
        }
    }
}
