<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TVendorCompany;
use frontend\models\TVendorCompanySearch;
use frontend\models\form\AssignCompanyType;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * VendorCompanyController implements the CRUD actions for TVendorCompany model.
 */
class VendorCompanyController extends Controller
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
     * Displays a single TVendorCompany model.
     * @param integer $id
     * @return mixed
     */
    public function actionIndex()
    {
        $companycateg = new AssignCompanyType();
        
        return $this->render('view', [
            'model' => $this->findModel(),
            'assign' => $companycateg,
        ]);
    }

    /**
     * Updates an existing TVendorCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel();

        if (Yii::$app->request->post()) {
            $model->prefix = $_POST['TVendorCompany']['prefix'];
            $model->name = $_POST['TVendorCompany']['name'];
            $model->sufix = $_POST['TVendorCompany']['sufix'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['index', 'id' => $model->t_vendor_company_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the TVendorCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        //if (($model = TVendorCompany::find()->where(['user_id', Yii::$app->user->identity->id])) !== null) {
        $user = Yii::$app->user->identity->id;
        $vendor = TVendorCompany::find()->where(['=','user_id', $user])->one();
        if (($model = TVendorCompany::findOne($vendor->t_vendor_company_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Assign items
     * @param string $id
     * @return array
     */
    public function actionAssign($id)
    {
        $items = Yii::$app->getRequest()->post('items', []);
        $model = new AssignCompanyType();
        $success = $model->addChildren($id,$items);
        Yii::$app->getResponse()->format = 'json';

        return array_merge($model->getItems($id), ['success' => $success]);
    }

    /**
     * Assign or remove items
     * @param string $id
     * @return array
     */
    public function actionRemove($id)
    {
        $items = Yii::$app->getRequest()->post('items', []);
        $model = new AssignCompanyType();
        $success = $model->removeChildren($id,$items);
        Yii::$app->getResponse()->format = 'json';

        return array_merge($model->getItems($id), ['success' => $success]);
    }
}
