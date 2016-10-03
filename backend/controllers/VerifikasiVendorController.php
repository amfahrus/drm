<?php

namespace backend\controllers;

use Yii;
use backend\models\TVendorCompany;
use backend\models\TVerifikasiVendor;
use backend\models\TVerifikasiVendorSearch;
use backend\models\TVendorKeuModal;
use backend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * VerifikasiVendorController implements the CRUD actions for TVerifikasiVendor model.
 */
class VerifikasiVendorController extends Controller
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
     * Lists all TVerifikasiVendor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TVerifikasiVendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVerifikasiVendor model.
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
     * Updates an existing TVerifikasiVendor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $kualifikasi = new TVendorKeuModal();
        $keumodal = TVendorKeuModal::find()->where(['=','t_vendor_company_id', $model->t_vendor_company_id])->one();

        if ($model->load(Yii::$app->request->post())) {
    				$model->status_nama_perusahaan = $_POST['TVerifikasiVendor']['status_nama_perusahaan'];
        		$model->keterangan_nama_perusahaan = $_POST['TVerifikasiVendor']['keterangan_nama_perusahaan'];
        		$model->status_alamat_perusahaan = $_POST['TVerifikasiVendor']['status_alamat_perusahaan'];
        		$model->keterangan_alamat_perusahaan = $_POST['TVerifikasiVendor']['keterangan_alamat_perusahaan'];
        		$model->status_akta_pendirian = $_POST['TVerifikasiVendor']['status_akta_pendirian'];
        		$model->keterangan_akta_pendirian = $_POST['TVerifikasiVendor']['keterangan_akta_pendirian'];
        		$model->status_nama_pengurus = $_POST['TVerifikasiVendor']['status_nama_pengurus'];
        		$model->keterangan_nama_pengurus = $_POST['TVerifikasiVendor']['keterangan_nama_pengurus'];
        		$model->status_alamat_pengurus = $_POST['TVerifikasiVendor']['status_alamat_pengurus'];
        		$model->keterangan_alamat_pengurus = $_POST['TVerifikasiVendor']['keterangan_alamat_pengurus'];
        		$model->status_nama_pemilik = $_POST['TVerifikasiVendor']['status_nama_pemilik'];
        		$model->keterangan_nama_pemilik = $_POST['TVerifikasiVendor']['keterangan_nama_pemilik'];
        		$model->status_alamat_pemilik = $_POST['TVerifikasiVendor']['status_alamat_pemilik'];
        		$model->keterangan_alamat_pemilik = $_POST['TVerifikasiVendor']['keterangan_alamat_pemilik'];
        		$model->status_npwp = $_POST['TVerifikasiVendor']['status_npwp'];
        		$model->keterangan_npwp = $_POST['TVerifikasiVendor']['keterangan_npwp'];
        		$model->status_sp_pkp = $_POST['TVerifikasiVendor']['status_sp_pkp'];
        		$model->keterangan_sp_pkp = $_POST['TVerifikasiVendor']['keterangan_sp_pkp'];
        		$model->status_siup = $_POST['TVerifikasiVendor']['status_siup'];
        		$model->keterangan_siup = $_POST['TVerifikasiVendor']['keterangan_siup'];
        		$model->status_siujk = $_POST['TVerifikasiVendor']['status_siujk'];
        		$model->keterangan_siujk = $_POST['TVerifikasiVendor']['keterangan_siujk'];
        		$model->status_sbu = $_POST['TVerifikasiVendor']['status_sbu'];
        		$model->keterangan_sbu = $_POST['TVerifikasiVendor']['keterangan_sbu'];
        		$model->status_ijin_domisili = $_POST['TVerifikasiVendor']['status_ijin_domisili'];
        		$model->keterangan_ijin_domisili = $_POST['TVerifikasiVendor']['keterangan_ijin_domisili'];
        		$model->status_tdu_tdp = $_POST['TVerifikasiVendor']['status_tdu_tdp'];
        		$model->keterangan_tdu_tdp = $_POST['TVerifikasiVendor']['keterangan_tdu_tdp'];
        		$model->status_asosiasi = $_POST['TVerifikasiVendor']['status_asosiasi'];
        		$model->keterangan_asosiasi = $_POST['TVerifikasiVendor']['keterangan_asosiasi'];
        		$model->status_iso_9001 = $_POST['TVerifikasiVendor']['status_iso_9001'];
        		$model->keterangan_iso_9001 = $_POST['TVerifikasiVendor']['keterangan_iso_9001'];
        		$model->status_ohsas_18001 = $_POST['TVerifikasiVendor']['status_ohsas_18001'];
        		$model->keterangan_ohsas_18001 = $_POST['TVerifikasiVendor']['keterangan_ohsas_18001'];
        		$model->status_iso_14001 = $_POST['TVerifikasiVendor']['status_iso_14001'];
        		$model->keterangan_iso_14001 = $_POST['TVerifikasiVendor']['keterangan_iso_14001'];
        		$model->status_pengalaman_kerja = $_POST['TVerifikasiVendor']['status_pengalaman_kerja'];
        		$model->keterangan_pengalaman_kerja = $_POST['TVerifikasiVendor']['keterangan_pengalaman_kerja'];
        		$model->status_barang_jasa = $_POST['TVerifikasiVendor']['status_barang_jasa'];
        		$model->keterangan_barang_jasa = $_POST['TVerifikasiVendor']['keterangan_barang_jasa'];
        		$model->status_tenaga_ahli = $_POST['TVerifikasiVendor']['status_tenaga_ahli'];
        		$model->keterangan_tenaga_ahli = $_POST['TVerifikasiVendor']['keterangan_tenaga_ahli'];
        		$model->status_daftar_alat = $_POST['TVerifikasiVendor']['status_daftar_alat'];
        		$model->keterangan_daftar_alat = $_POST['TVerifikasiVendor']['keterangan_daftar_alat'];
        		$model->rekomendasi = $_POST['TVerifikasiVendor']['rekomendasi'];
    				$model->create_user = Yii::$app->user->identity->id;
    				$model->update_user = Yii::$app->user->identity->id;
    				if($model->update()){
                $kualifikasi = TVendorKeuModal::findOne($keumodal->t_vendor_keu_modal_id);
                $kualifikasi->klasifikasi = $_POST['TVerifikasiVendor']['klasifikasi'];
                $kualifikasi->update();
            }
            if($model->rekomendasi > 0){
              $vendor = TVendorCompany::findOne($model->t_vendor_company_id);
              $users = User::findOne($vendor->user_id);
              Yii::$app->mailer->compose()
                ->setFrom('pengadaan@brantas-abipraya.co.id')
                ->setTo($users->email)
                ->setCc('wiz.stalker@gmail.com')
                ->setSubject('Pemberitahuan Lulus Verifikasi Vendor PT. Brantas Abipraya (Persero)')
                //->setTextBody($model->pesan.'http://eproc.brantas-abipraya.co.id/vendor/register/'.$model->t_undangan_id)
                ->setHtmlBody('REDAKSI<br><br><a href="http://eproc.brantas-abipraya.co.id/vendor/login/">http://eproc.brantas-abipraya.co.id/vendor/login/</a>')
                ->send();
            }
            return $this->redirect(['view', 'id' => $model->t_verifikasi_vendor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the TVerifikasiVendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVerifikasiVendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVerifikasiVendor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
