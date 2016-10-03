<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TVerifikasiVendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tverifikasi-vendor-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="table-responsive">
      <table class="table">
          <tbody>
            <tr class="info">
              <td colspan="3">
                <h3>ASPEK LEGALITAS</h3>
              </td>
            </tr>
            <tr>
              <td>
                Nama Perusahaan
              </td>
              <td>
                <?= $form->field($model, 'status_nama_perusahaan')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_nama_perusahaan')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_nama_perusahaan')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Alamat Perusahaan
              </td>
              <td>
                <?= $form->field($model, 'status_alamat_perusahaan')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_alamat_perusahaan')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_alamat_perusahaan')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Akta Pendirian
              </td>
              <td>
                <?= $form->field($model, 'status_akta_pendirian')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_akta_pendirian')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_akta_pendirian')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Nama Pengurus Perusahaan
              </td>
              <td>
                <?= $form->field($model, 'status_nama_pengurus')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_nama_pengurus')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_nama_pengurus')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Alamat Pengurus
              </td>
              <td>
                <?= $form->field($model, 'status_alamat_pengurus')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_alamat_pengurus')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_alamat_pengurus')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Nama Pemilik / Penanggung Jawab
              </td>
              <td>
                <?= $form->field($model, 'status_nama_pemilik')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_nama_pemilik')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_nama_pemilik')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Alamat Pemilik
              </td>
              <td>
                <?= $form->field($model, 'status_alamat_pemilik')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_alamat_pemilik')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_alamat_pemilik')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                NPWP
              </td>
              <td>
                <?= $form->field($model, 'status_npwp')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_npwp')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_npwp')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                SP PKP
              </td>
              <td>
                <?= $form->field($model, 'status_sp_pkp')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_sp_pkp')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_sp_pkp')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                SIUP
              </td>
              <td>
                <?= $form->field($model, 'status_siup')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_siup')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_siup')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                SIUJK
              </td>
              <td>
                <?= $form->field($model, 'status_siujk')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_siujk')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_siujk')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                SBU
              </td>
              <td>
                <?= $form->field($model, 'status_sbu')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_sbu')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_sbu')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Ijin Domisili
              </td>
              <td>
                <?= $form->field($model, 'status_ijin_domisili')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_ijin_domisili')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_ijin_domisili')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                TDU/TDP
              </td>
              <td>
                <?= $form->field($model, 'status_tdu_tdp')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_tdu_tdp')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_tdu_tdp')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Asosiasi: Gapensi / AABI / AKI dsb
              </td>
              <td>
                <?= $form->field($model, 'status_asosiasi')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_asosiasi')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_asosiasi')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Sertifikat ISO 9001
              </td>
              <td>
                <?= $form->field($model, 'status_iso_9001')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_iso_9001')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_iso_9001')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Sertifikat OHSAS 18001
              </td>
              <td>
                <?= $form->field($model, 'status_ohsas_18001')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_ohsas_18001')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_ohsas_18001')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Sertifikat ISO 14001
              </td>
              <td>
                <?= $form->field($model, 'status_iso_14001')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_iso_14001')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_iso_14001')->textArea() ?>
              </td>
            </tr>
            <tr class="danger">
              <td colspan="3">
                <h3>ASPEK TEKNIS</h3>
              </td>
            </tr>
            <tr>
              <td>
                Pengalaman Kerja
              </td>
              <td>
                <?= $form->field($model, 'status_pengalaman_kerja')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_pengalaman_kerja')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_pengalaman_kerja')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Barang/Jasa yang dipasok
              </td>
              <td>
                <?= $form->field($model, 'status_barang_jasa')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_barang_jasa')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_barang_jasa')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Daftar Tenaga Ahli
              </td>
              <td>
                <?= $form->field($model, 'status_tenaga_ahli')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_tenaga_ahli')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_tenaga_ahli')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
                Daftar Alat
              </td>
              <td>
                <?= $form->field($model, 'status_daftar_alat')->radio(['label' => 'Ada', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'status_daftar_alat')->radio(['label' => 'Tidak Ada', 'value' => 0, 'uncheck' => null]) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_daftar_alat')->textArea() ?>
              </td>
            </tr>
            <tr class="success">
              <td colspan="3">
                <h3>KESIMPULAN VERIFIKASI</h3>
              </td>
            </tr>
            <tr>
              <td>
                Rekomendasi
              </td>
              <td colspan="2">
                <?= $form->field($model, 'rekomendasi')->radio(['label' => 'Lulus', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'rekomendasi')->radio(['label' => 'Tidak Lulus', 'value' => 0, 'uncheck' => null]) ?>
              </td>
            </tr>
            <tr>
              <td colspan="3">
              <?= $form->field($model, 'klasifikasi')->dropdownList(['Besar' => 'Besar', 'Menengah' => 'Menengah', 'Kecil' => 'Kecil'],['prompt'=>'-Pilih-']) ?>
              </td>
            </tr>
          </tbody>
      </table>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
