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
              <td colspan="2">
                <h3>ASPEK LEGALITAS</h3>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_nama_perusahaan')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_nama_perusahaan')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_alamat_perusahaan')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_alamat_perusahaan')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_akta_pendirian')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_akta_pendirian')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_nama_pengurus')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_nama_pengurus')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_alamat_pengurus')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_alamat_pengurus')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_nama_pemilik')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_nama_pemilik')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_alamat_pemilik')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_alamat_pemilik')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_npwp')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_npwp')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_sp_pkp')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_sp_pkp')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_siup')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_siup')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_siujk')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_siujk')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_sbu')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_sbu')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_ijin_domisili')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_ijin_domisili')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_tdu_tdp')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_tdu_tdp')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_asosiasi')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_asosiasi')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_iso_9001')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_iso_9001')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_ohsas_18001')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_ohsas_18001')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_iso_14001')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_iso_14001')->textArea() ?>
              </td>
            </tr>
            <tr class="danger">
              <td colspan="2">
                <h3>ASPEK TEKNIS</h3>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_pengalaman_kerja')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_pengalaman_kerja')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_barang_jasa')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_barang_jasa')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_tenaga_ahli')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_tenaga_ahli')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_daftar_alat')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_daftar_alat')->textArea() ?>
              </td>
            </tr>
            <tr>
              <td>
              <?= $form->field($model, 'status_daftar_alat')->dropdownList([1 => 'Ada', 0 => 'Tidak Ada'],['prompt'=>'-Pilih-']) ?>
              </td>
              <td>
              <?= $form->field($model, 'keterangan_daftar_alat')->textArea() ?>
              </td>
            </tr>
            <tr class="success">
              <td colspan="2">
                <h3>KESIMPULAN VERIFIKASI</h3>
              </td>
            </tr>
            <tr>
              <td colspan="2">
              <?= $form->field($model, 'rekomendasi')->dropdownList([1 => 'Lulus', 0 => 'Tidak Lulus'],['prompt'=>'-Pilih-']) ?>
              </td>
            </tr>
            <tr>
              <td colspan="2">
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
