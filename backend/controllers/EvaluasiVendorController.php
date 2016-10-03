<?php

namespace backend\controllers;

use Yii;
use backend\models\TEvaluasiVendor;
use backend\models\TEvaluasiVendorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TVendorTeknisKomoditi;

/**
 * EvaluasiVendorController implements the CRUD actions for TEvaluasiVendor model.
 */
class EvaluasiVendorController extends Controller
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
     * Lists all TEvaluasiVendor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TEvaluasiVendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TEvaluasiVendor model.
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
     * Creates a new TEvaluasiVendor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TEvaluasiVendor();

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $_POST['TEvaluasiVendor']['t_vendor_company_id'];
            $model->nomor_kontrak = $_POST['TEvaluasiVendor']['nomor_kontrak'];
            $model->nilai_ketersediaan = $_POST['TEvaluasiVendor']['nilai_ketersediaan'];
            $model->catatan_ketersediaan = $_POST['TEvaluasiVendor']['catatan_ketersediaan'];
            $model->nilai_work_instruction = $_POST['TEvaluasiVendor']['nilai_work_instruction'];
            $model->catatan_work_instruction = $_POST['TEvaluasiVendor']['catatan_work_instruction'];
            $model->nilai_ketepatan_waktu = $_POST['TEvaluasiVendor']['nilai_ketepatan_waktu'];
            $model->catatan_ketepatan_waktu = $_POST['TEvaluasiVendor']['catatan_ketepatan_waktu'];
            $model->nilai_nc_produk = $_POST['TEvaluasiVendor']['nilai_nc_produk'];
            $model->catatan_nc_produk = $_POST['TEvaluasiVendor']['catatan_nc_produk'];
            $model->nilai_dampak_lingkungan = $_POST['TEvaluasiVendor']['nilai_dampak_lingkungan'];
            $model->catatan_dampak_lingkungan = $_POST['TEvaluasiVendor']['catatan_dampak_lingkungan'];
            $model->nilai_pemenuhan_peraturan = $_POST['TEvaluasiVendor']['nilai_pemenuhan_peraturan'];
            $model->catatan_pemenuhan_peraturan = $_POST['TEvaluasiVendor']['catatan_pemenuhan_peraturan'];
            $model->nilai_kecelakaan_kerja = $_POST['TEvaluasiVendor']['nilai_kecelakaan_kerja'];
            $model->catatan_kecelakaan_kerja = $_POST['TEvaluasiVendor']['catatan_kecelakaan_kerja'];
            $model->nilai_hilang_jam_kerja = $_POST['TEvaluasiVendor']['nilai_hilang_jam_kerja'];
            $model->catatan_hilang_jam_kerja = $_POST['TEvaluasiVendor']['catatan_hilang_jam_kerja'];
            $model->hasil_penilaian = $_POST['TEvaluasiVendor']['hasil_penilaian'];
            $model->catatan = $_POST['TEvaluasiVendor']['catatan'];
            $model->t_vendor_teknis_komoditi_id = $_POST['TEvaluasiVendor']['t_vendor_teknis_komoditi_id'];
            $model->create_user = Yii::$app->user->identity->id;
            $model->update_user = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->t_evaluasi_vendor_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TEvaluasiVendor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->t_vendor_company_id = $_POST['TEvaluasiVendor']['t_vendor_company_id'];
            $model->nomor_kontrak = $_POST['TEvaluasiVendor']['nomor_kontrak'];
            $model->nilai_ketersediaan = $_POST['TEvaluasiVendor']['nilai_ketersediaan'];
            $model->catatan_ketersediaan = $_POST['TEvaluasiVendor']['catatan_ketersediaan'];
            $model->nilai_work_instruction = $_POST['TEvaluasiVendor']['nilai_work_instruction'];
            $model->catatan_work_instruction = $_POST['TEvaluasiVendor']['catatan_work_instruction'];
            $model->nilai_ketepatan_waktu = $_POST['TEvaluasiVendor']['nilai_ketepatan_waktu'];
            $model->catatan_ketepatan_waktu = $_POST['TEvaluasiVendor']['catatan_ketepatan_waktu'];
            $model->nilai_nc_produk = $_POST['TEvaluasiVendor']['nilai_nc_produk'];
            $model->catatan_nc_produk = $_POST['TEvaluasiVendor']['catatan_nc_produk'];
            $model->nilai_dampak_lingkungan = $_POST['TEvaluasiVendor']['nilai_dampak_lingkungan'];
            $model->catatan_dampak_lingkungan = $_POST['TEvaluasiVendor']['catatan_dampak_lingkungan'];
            $model->nilai_pemenuhan_peraturan = $_POST['TEvaluasiVendor']['nilai_pemenuhan_peraturan'];
            $model->catatan_pemenuhan_peraturan = $_POST['TEvaluasiVendor']['catatan_pemenuhan_peraturan'];
            $model->nilai_kecelakaan_kerja = $_POST['TEvaluasiVendor']['nilai_kecelakaan_kerja'];
            $model->catatan_kecelakaan_kerja = $_POST['TEvaluasiVendor']['catatan_kecelakaan_kerja'];
            $model->nilai_hilang_jam_kerja = $_POST['TEvaluasiVendor']['nilai_hilang_jam_kerja'];
            $model->catatan_hilang_jam_kerja = $_POST['TEvaluasiVendor']['catatan_hilang_jam_kerja'];
            $model->hasil_penilaian = $_POST['TEvaluasiVendor']['hasil_penilaian'];
            $model->catatan = $_POST['TEvaluasiVendor']['catatan'];
            $model->t_vendor_teknis_komoditi_id = $_POST['TEvaluasiVendor']['t_vendor_teknis_komoditi_id'];
            $model->update_user = Yii::$app->user->identity->id;
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();
            return $this->redirect(['view', 'id' => $model->t_evaluasi_vendor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TEvaluasiVendor model.
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
     * Finds the TEvaluasiVendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TEvaluasiVendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TEvaluasiVendor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionKomoditiLists($id)
    {
        $countPosts = TVendorTeknisKomoditi::find()
            ->where(['t_vendor_company_id' => $id])
            ->count();

        $posts = TVendorTeknisKomoditi::find()
            ->where(['t_vendor_company_id' => $id])
            ->orderBy('nama ASC')
            ->all();

        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->t_vendor_teknis_komoditi_id."'>".$post->nama."</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

}
