<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class DataVendorController extends Controller
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDataUtama()
    {
        return $this->render('data-utama');
    }

    public function actionDataLegal()
    {
        return $this->render('data-legal');
    }

    public function actionPengurusPerusahaan()
    {
        return $this->render('pengurus-perusahaan');
    }

    public function actionDataKeuangan()
    {
        return $this->render('data-keuangan');
    }

    public function actionBarangJasa()
    {
        return $this->render('barang-jasa');
    }

    public function actionSdm()
    {
        return $this->render('sdm');
    }

    public function actionSertifikasi()
    {
        return $this->render('sertifikasi');
    }

    public function actionFasilitasPeralatan()
    {
        return $this->render('fasilitas-peralatan');
    }

    public function actionPengalamanProyek()
    {
        return $this->render('pengalaman-proyek');
    }

    public function actionDataTambahan()
    {
        return $this->render('data-tambahan');
    }

}
