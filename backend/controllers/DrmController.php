<?php

namespace backend\controllers;

use Yii;
use backend\models\DrmSearch;
use backend\models\TVendorCompany;
use backend\models\form\AssignCompanyType;
use backend\models\TVendorCompanySite;
use backend\models\TVendorCompanySiteSearch;
use backend\models\TContactPerson;
use backend\models\TContactPersonSearch;
use backend\models\TVendorLegalAkta;
use backend\models\TVendorLegalAktaSearch;
use backend\models\TVendorLegalDomisili;
use backend\models\TVendorLegalDomisiliSearch;
use backend\models\TVendorLegalNpwp;
use backend\models\TVendorLegalNpwpSearch;
use backend\models\TVendorLegalSiup;
use backend\models\TVendorLegalSiupSearch;
use backend\models\TVendorLegalIjinlain;
use backend\models\TVendorLegalIjinlainSearch;
use backend\models\TVendorKepengurusan;
use backend\models\TDewanKomisarisSearch;
use backend\models\TDewanDireksiSearch;
use backend\models\TPemilikSearch;
use backend\models\TVendorKeuRekening;
use backend\models\TVendorKeuRekeningSearch;
use backend\models\TVendorKeuModal;
use backend\models\TVendorKeuModalSearch;
use backend\models\TVendorKeuLaporan;
use backend\models\TVendorKeuLaporanSearch;
use backend\models\TVendorTeknisKomoditi;
use backend\models\TVendorTeknisKomoditiBarangSearch;
use backend\models\TVendorTeknisKomoditiJasaSearch;
use backend\models\TVendorKomoditiHarga;
use backend\models\TVendorKomoditiHargaSearch;
use backend\models\TVendorSdm;
use backend\models\TVendorSdmUtamaSearch;
use backend\models\TVendorSdmPendukungSearch;
use backend\models\TVendorTeknisSertifikat;
use backend\models\TVendorTeknisSertifikatSearch;
use backend\models\TVendorTeknisAlat;
use backend\models\TVendorTeknisAlatSearch;
use backend\models\TVendorTeknisPengalaman;
use backend\models\TVendorTeknisPengalamanSearch;
use backend\models\TVendorTeknisTambahan;
use backend\models\TVendorTeknisTambahanSearch;
use backend\models\PMasterCountry;
use backend\models\PMasterRegion;
use backend\models\PMasterCity;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DrmController implements the CRUD actions for TVendorCompany model.
 */
class DrmController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Lists all TVendorCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorCompany model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TVendorCompany::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDataIndex()
    {
        return $this->render('data-index');
    }

    public function actionDataUtama($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('data-utama', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDataLegal($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('data-legal', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPengurusPerusahaan($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pengurus-perusahaan', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDataKeuangan($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('data-keuangan', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBarangJasa($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('barang-jasa', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSdm($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('sdm', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSertifikasi($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('sertifikasi', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFasilitasPeralatan($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('fasilitas-peralatan', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPengalamanProyek($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pengalaman-proyek', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDataTambahan($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('data-tambahan', [
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionVendorCompany($id)
    {
        $companycateg = new AssignCompanyType();
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('vendor-company', [
            'model' => $this->findModel($id),
            'assign' => $companycateg,
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionVendorSite($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelVendorSite = new TVendorCompanySiteSearch();
        $dataProviderVendorSite = $searchModelVendorSite->search(Yii::$app->request->queryParams,$id);

        return $this->render('vendor-site', [
            'searchModelVendorSite' => $searchModelVendorSite,
            'dataProviderVendorSite' => $dataProviderVendorSite,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorCompanySite model.
     * @param integer $id
     * @return mixed
     */
    public function actionVendorSiteView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('vendor-site-view', [
            'modelVendorSite' => $this->findVendorSiteModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorCompanySite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorCompanySite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVendorSiteModel($id)
    {
        if (($model = TVendorCompanySite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionContactPerson($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelContactPerson = new TContactPersonSearch();
        $dataProviderContactPerson = $searchModelContactPerson->search(Yii::$app->request->queryParams,$id);

        return $this->render('contact-person', [
            'searchModelContactPerson' => $searchModelContactPerson,
            'dataProviderContactPerson' => $dataProviderContactPerson,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TContactPerson model.
     * @param integer $id
     * @return mixed
     */
    public function actionContactPersonView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('contact-person-view', [
            'modelContactPerson' => $this->findContactPersonModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TContactPerson model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TContactPerson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findContactPersonModel($id)
    {
        if (($model = TContactPerson::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorLegalAkta models.
     * @return mixed
     */
    public function actionAktaPendirian($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelAktaPendirian = new TVendorLegalAktaSearch();
        $dataProviderAktaPendirian = $searchModelAktaPendirian->search(Yii::$app->request->queryParams,$id);

        return $this->render('akta-pendirian', [
            'searchModelAktaPendirian' => $searchModelAktaPendirian,
            'dataProviderAktaPendirian' => $dataProviderAktaPendirian,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorLegalAkta model.
     * @param integer $id
     * @return mixed
     */
    public function actionAktaPendirianView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('akta-pendirian-view', [
            'modelAktaPendirian' => $this->findAktaPendirianModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorLegalAkta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorLegalAkta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findAktaPendirianModel($id)
    {
        if (($model = TVendorLegalAkta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorLegalDomisili models.
     * @return mixed
     */
    public function actionDomisiliPerusahaan($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelDomisiliPerusahaan = new TVendorLegalDomisiliSearch();
        $dataProviderDomisiliPerusahaan = $searchModelDomisiliPerusahaan->search(Yii::$app->request->queryParams,$id);

        return $this->render('domisili-perusahaan', [
            'searchModelDomisiliPerusahaan' => $searchModelDomisiliPerusahaan,
            'dataProviderDomisiliPerusahaan' => $dataProviderDomisiliPerusahaan,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorLegalDomisili model.
     * @param integer $id
     * @return mixed
     */
    public function actionDomisiliPerusahaanView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('domisili-perusahaan-view', [
            'modelDomisiliPerusahaan' => $this->findDomisiliPerusahaanModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorLegalDomisili model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorLegalDomisili the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDomisiliPerusahaanModel($id)
    {
        if (($model = TVendorLegalDomisili::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorLegalNpwp models.
     * @return mixed
     */
    public function actionNpwp($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelNPWP = new TVendorLegalNpwpSearch();
        $dataProviderNPWP = $searchModelNPWP->search(Yii::$app->request->queryParams,$id);

        return $this->render('npwp', [
            'searchModelNPWP' => $searchModelNPWP,
            'dataProviderNPWP' => $dataProviderNPWP,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorLegalNpwp model.
     * @param integer $id
     * @return mixed
     */
    public function actionNpwpView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('npwp-view', [
            'modelNPWP' => $this->findNPWPModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorLegalNpwp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorLegalNpwp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findNpwpModel($id)
    {
        if (($model = TVendorLegalNpwp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorLegalSiup models.
     * @return mixed
     */
    public function actionSiup($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelSiup = new TVendorLegalSiupSearch();
        $dataProviderSiup = $searchModelSiup->search(Yii::$app->request->queryParams,$id);

        return $this->render('siup', [
            'searchModelSiup' => $searchModelSiup,
            'dataProviderSiup' => $dataProviderSiup,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorLegalSiup model.
     * @param integer $id
     * @return mixed
     */
    public function actionSiupView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('siup-view', [
            'modelSiup' => $this->findSiupModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorLegalSiup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorLegalSiup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findSiupModel($id)
    {
        if (($model = TVendorLegalSiup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorLegalIjinlain models.
     * @return mixed
     */
    public function actionIzinLain($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelIzinLain = new TVendorLegalIjinlainSearch();
        $dataProviderIzinLain = $searchModelIzinLain->search(Yii::$app->request->queryParams,$id);

        return $this->render('izin-lain', [
            'searchModelIzinLain' => $searchModelIzinLain,
            'dataProviderIzinLain' => $dataProviderIzinLain,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorLegalIjinlain model.
     * @param integer $id
     * @return mixed
     */
    public function actionIzinLainView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('izin-lain-view', [
            'modelIzinLain' => $this->findIzinLainModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorLegalIjinlain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorLegalIjinlain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findIzinLainModel($id)
    {
        if (($model = TVendorLegalIjinlain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorKepengurusan models.
     * @return mixed
     */
    public function actionDewanKomisaris($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelDewanKomisaris = new TDewanKomisarisSearch();
        $dataProviderDewanKomisaris = $searchModelDewanKomisaris->search(Yii::$app->request->queryParams,$id);

        return $this->render('dewan-komisaris', [
            'searchModelDewanKomisaris' => $searchModelDewanKomisaris,
            'dataProviderDewanKomisaris' => $dataProviderDewanKomisaris,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorKepengurusan model.
     * @param integer $id
     * @return mixed
     */
    public function actionDewanKomisarisView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('dewan-komisaris-view', [
            'modelDewanKomisaris' => $this->findDewanKomisarisModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorKepengurusan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKepengurusan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDewanKomisarisModel($id)
    {
        if (($model = TVendorKepengurusan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorKepengurusan models.
     * @return mixed
     */
    public function actionDewanDireksi($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelDewanDireksi = new TDewanDireksiSearch();
        $dataProviderDewanDireksi = $searchModelDewanDireksi->search(Yii::$app->request->queryParams,$id);

        return $this->render('dewan-direksi', [
            'searchModelDewanDireksi' => $searchModelDewanDireksi,
            'dataProviderDewanDireksi' => $dataProviderDewanDireksi,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorKepengurusan model.
     * @param integer $id
     * @return mixed
     */
    public function actionDewanDireksiView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('dewan-direksi-view', [
            'modelDewanDireksi' => $this->findDewanDireksiModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorKepengurusan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKepengurusan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDewanDireksiModel($id)
    {
        if (($model = TVendorKepengurusan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorKepengurusan models.
     * @return mixed
     */
    public function actionPemilik($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelPemilik = new TPemilikSearch();
        $dataProviderPemilik = $searchModelPemilik->search(Yii::$app->request->queryParams,$id);

        return $this->render('pemilik', [
            'searchModelPemilik' => $searchModelPemilik,
            'dataProviderPemilik' => $dataProviderPemilik,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorKepengurusan model.
     * @param integer $id
     * @return mixed
     */
    public function actionPemilikView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pemilik-view', [
            'modelPemilik' => $this->findPemilikModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorKepengurusan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKepengurusan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPemilikModel($id)
    {
        if (($model = TVendorKepengurusan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorKeuRekening models.
     * @return mixed
     */
    public function actionRekeningBank($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelRekeningBank = new TVendorKeuRekeningSearch();
        $dataProviderRekeningBank = $searchModelRekeningBank->search(Yii::$app->request->queryParams,$id);

        return $this->render('rekening-bank', [
            'searchModelRekeningBank' => $searchModelRekeningBank,
            'dataProviderRekeningBank' => $dataProviderRekeningBank,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorKeuRekening model.
     * @param integer $id
     * @return mixed
     */
    public function actionRekeningBankView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('rekening-bank-view', [
            'modelRekeningBank' => $this->findRekeningBankModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorKeuRekening model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKeuRekening the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findRekeningBankModel($id)
    {
        if (($model = TVendorKeuRekening::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorKeuModal models.
     * @return mixed
     */
    public function actionModal($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('modal', [
            'model' => $this->findModel($id),
            'modelModal' => $this->findModalModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorKeuModal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKeuModal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModalModel($id)
    {
        $modal = TVendorKeuModal::find()->where(['=','t_vendor_company_id', $id])->one();
        if (($model = TVendorKeuModal::findOne($modal->t_vendor_keu_modal_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorKeuLaporan models.
     * @return mixed
     */
    public function actionLaporanKeuangan($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelLaporanKeuangan = new TVendorKeuLaporanSearch();
        $dataProviderLaporanKeuangan = $searchModelLaporanKeuangan->search(Yii::$app->request->queryParams,$id);

        return $this->render('laporan-keuangan', [
            'searchModelLaporanKeuangan' => $searchModelLaporanKeuangan,
            'dataProviderLaporanKeuangan' => $dataProviderLaporanKeuangan,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorKeuLaporan model.
     * @param integer $id
     * @return mixed
     */
    public function actionLaporanKeuanganView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('laporan-keuangan-view', [
            'modelLaporanKeuangan' => $this->findLaporanKeuanganModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorKeuLaporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorKeuLaporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findLaporanKeuanganModel($id)
    {
        if (($model = TVendorKeuLaporan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorTeknisKomoditi models.
     * @return mixed
     */
    public function actionBarang($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelBarang = new TVendorTeknisKomoditiBarangSearch();
        $dataProviderBarang = $searchModelBarang->search(Yii::$app->request->queryParams,$id);

        return $this->render('barang', [
            'searchModelBarang' => $searchModelBarang,
            'dataProviderBarang' => $dataProviderBarang,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisKomoditi model.
     * @param integer $id
     * @return mixed
     */
    public function actionBarangView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelHarga = new TVendorKomoditiHargaSearch();
        $dataProviderHarga = $searchModelHarga->search(Yii::$app->request->queryParams,$sid);

        return $this->render('barang-view', [
            'searchModelHarga' => $searchModelHarga,
            'dataProviderHarga' => $dataProviderHarga,
            'modelBarang' => $this->findBarangModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorTeknisKomoditi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisKomoditi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findBarangModel($id)
    {
        if (($model = TVendorTeknisKomoditi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorTeknisKomoditi models.
     * @return mixed
     */
    public function actionJasa($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelJasa = new TVendorTeknisKomoditiJasaSearch();
        $dataProviderJasa = $searchModelJasa->search(Yii::$app->request->queryParams,$id);

        return $this->render('jasa', [
            'searchModelJasa' => $searchModelJasa,
            'dataProviderJasa' => $dataProviderJasa,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisKomoditi model.
     * @param integer $id
     * @return mixed
     */
    public function actionJasaView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelHarga = new TVendorKomoditiHargaSearch();
        $dataProviderHarga = $searchModelHarga->search(Yii::$app->request->queryParams,$sid);

        return $this->render('jasa-view', [
            'searchModelHarga' => $searchModelHarga,
            'dataProviderHarga' => $dataProviderHarga,
            'modelJasa' => $this->findJasaModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorTeknisKomoditi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisKomoditi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findJasaModel($id)
    {
        if (($model = TVendorTeknisKomoditi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorSdm models.
     * @return mixed
     */
    public function actionUtama($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelUtama = new TVendorSdmUtamaSearch();
        $dataProviderUtama = $searchModelUtama->search(Yii::$app->request->queryParams,$id);

        return $this->render('utama', [
            'searchModelUtama' => $searchModelUtama,
            'dataProviderUtama' => $dataProviderUtama,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorSdm model.
     * @param integer $id
     * @return mixed
     */
    public function actionUtamaView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('utama-view', [
            'modelUtama' => $this->findUtamaModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorSdm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorSdm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUtamaModel($id)
    {
        if (($model = TVendorSdm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorSdm models.
     * @return mixed
     */
    public function actionPendukung($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelPendukung = new TVendorSdmPendukungSearch();
        $dataProviderPendukung = $searchModelPendukung->search(Yii::$app->request->queryParams,$id);

        return $this->render('pendukung', [
            'searchModelPendukung' => $searchModelPendukung,
            'dataProviderPendukung' => $dataProviderPendukung,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorSdm model.
     * @param integer $id
     * @return mixed
     */
    public function actionPendukungView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pendukung-view', [
            'modelPendukung' => $this->findPendukungModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorSdm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorSdm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPendukungModel($id)
    {
        if (($model = TVendorSdm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorTeknisSertifikat models.
     * @return mixed
     */
    public function actionSertifikat($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelSertifikat = new TVendorTeknisSertifikatSearch();
        $dataProviderSertifikat = $searchModelSertifikat->search(Yii::$app->request->queryParams,$id);

        return $this->render('sertifikat', [
            'searchModelSertifikat' => $searchModelSertifikat,
            'dataProviderSertifikat' => $dataProviderSertifikat,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisSertifikat model.
     * @param integer $id
     * @return mixed
     */
    public function actionSertifikatView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('sertifikat-view', [
            'modelSertifikat' => $this->findSertifikatModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorTeknisSertifikat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisSertifikat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findSertifikatModel($id)
    {
        if (($model = TVendorTeknisSertifikat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorTeknisAlat models.
     * @return mixed
     */
    public function actionFasilitas($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelFasilitas = new TVendorTeknisAlatSearch();
        $dataProviderFasilitas = $searchModelFasilitas->search(Yii::$app->request->queryParams,$id);

        return $this->render('fasilitas', [
            'searchModelFasilitas' => $searchModelFasilitas,
            'dataProviderFasilitas' => $dataProviderFasilitas,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisAlat model.
     * @param integer $id
     * @return mixed
     */
    public function actionFasilitasView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('fasilitas-view', [
            'modelFasilitas' => $this->findFasilitasModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorTeknisAlat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisAlat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findFasilitasModel($id)
    {
        if (($model = TVendorTeknisAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorTeknisPengalaman models.
     * @return mixed
     */
    public function actionPengalaman($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelPengalaman = new TVendorTeknisPengalamanSearch();
        $dataProviderPengalaman = $searchModelPengalaman->search(Yii::$app->request->queryParams,$id);

        return $this->render('pengalaman', [
            'searchModelPengalaman' => $searchModelPengalaman,
            'dataProviderPengalaman' => $dataProviderPengalaman,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisPengalaman model.
     * @param integer $id
     * @return mixed
     */
    public function actionPengalamanView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pengalaman-view', [
            'modelPengalaman' => $this->findPengalamanModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorTeknisPengalaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisPengalaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPengalamanModel($id)
    {
        if (($model = TVendorTeknisPengalaman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all TVendorTeknisTambahan models.
     * @return mixed
     */
    public function actionTambahan($id)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelTambahan = new TVendorTeknisTambahanSearch();
        $dataProviderTambahan = $searchModelTambahan->search(Yii::$app->request->queryParams,$id);

        return $this->render('tambahan', [
            'searchModelTambahan' => $searchModelTambahan,
            'dataProviderTambahan' => $dataProviderTambahan,
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TVendorTeknisTambahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionTambahanView($id,$sid)
    {
        $searchModel = new DrmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('tambahan-view', [
            'modelTambahan' => $this->findTambahanModel($sid),
            'model' => $this->findModel($id),
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TVendorTeknisTambahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TVendorTeknisTambahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTambahanModel($id)
    {
        if (($model = TVendorTeknisTambahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
