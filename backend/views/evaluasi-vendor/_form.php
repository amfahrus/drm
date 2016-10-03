<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TVendorCompany;
use backend\models\TVendorTeknisKomoditi;

/* @var $this yii\web\View */
/* @var $model backend\models\TEvaluasiVendor */
/* @var $form yii\widgets\ActiveForm */
$vendor = ArrayHelper::map(TVendorCompany::find()->all(),'t_vendor_company_id','name');
$komoditi = ArrayHelper::map(TVendorTeknisKomoditi::find()->all(),'t_vendor_teknis_komoditi_id','nama');
?>

<div class="tevaluasi-vendor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 't_vendor_company_id')->dropdownList($vendor,['id'=>'vendor',
    'prompt'=>'-Pilih Vendor-','onchange'=>'
      $.post( "'.Yii::$app->urlManager->createUrl('evaluasi-vendor/komoditi-lists?id=').'"+$(this).val(), function( data ) {
        $( "select#komoditi" ).html( data );
      });
      ']) ?>
      
    <?= $form->field($model, 'nomor_kontrak')->textInput() ?>

    <?= $form->field($model, 't_vendor_teknis_komoditi_id')->dropdownList($komoditi,['id'=>'komoditi','prompt'=>'-Pilih Komoditi-',]) ?>


    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td><b>Uraian</b></td>
            <td><b>Nilai</b></td>
            <td><b>Bobot</b></td>
            <td><b>N x B</b></td>
            <td><b>Catatan</b></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              Ketersediaan / Kecukupan Sumber Daya
            </td>
            <td>
              <?= $form->field($model, 'nilai_ketersediaan')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_ketersediaan" ).val( $(this).val() * 20 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              20
            </td>
            <td>
              <?= $form->field($model, 'nxb_ketersediaan')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_ketersediaan')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              Work Instruction / Construction Metdhod / Desain Method
            </td>
            <td>
              <?= $form->field($model, 'nilai_work_instruction')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_work_instruction" ).val( $(this).val() * 10 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              10
            </td>
            <td>
              <?= $form->field($model, 'nxb_work_instruction')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_work_instruction')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              Ketepatan Waktu Pelaksanaan
            </td>
            <td>
              <?= $form->field($model, 'nilai_ketepatan_waktu')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_ketepatan_waktu" ).val( $(this).val() * 10 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              10
            </td>
            <td>
              <?= $form->field($model, 'nxb_ketepatan_waktu')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_ketepatan_waktu')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              NC Produk / Keluhan Pelanggan
            </td>
            <td>
              <?= $form->field($model, 'nilai_nc_produk')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_nc_produk" ).val( $(this).val() * 10 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              10
            </td>
            <td>
              <?= $form->field($model, 'nxb_nc_produk')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_nc_produk')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              Menurunkan Signifikasi Dampak Lingkungan
            </td>
            <td>
              <?= $form->field($model, 'nilai_dampak_lingkungan')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_dampak_lingkungan" ).val( $(this).val() * 15 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              15
            </td>
            <td>
              <?= $form->field($model, 'nxb_dampak_lingkungan')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_dampak_lingkungan')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              Pemenuhan Peraturan / Perundangan K3L
            </td>
            <td>
              <?= $form->field($model, 'nilai_pemenuhan_peraturan')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_pemenuhan_peraturan" ).val( $(this).val() * 10 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              10
            </td>
            <td>
              <?= $form->field($model, 'nxb_pemenuhan_peraturan')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_pemenuhan_peraturan')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              Kecelakaan Kerja
            </td>
            <td>
              <?= $form->field($model, 'nilai_kecelakaan_kerja')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_kecelakaan_kerja" ).val( $(this).val() * 15 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              15
            </td>
            <td>
              <?= $form->field($model, 'nxb_kecelakaan_kerja')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_kecelakaan_kerja')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              Hilang Jam Kerja
            </td>
            <td>
              <?= $form->field($model, 'nilai_hilang_jam_kerja')->textInput(['oninput'=>'
                $( "input#tevaluasivendor-nxb_hilang_jam_kerja" ).val( $(this).val() * 10 );
                var total = (+$("#tevaluasivendor-nxb_ketersediaan").val()) + (+$("#tevaluasivendor-nxb_work_instruction").val()) + (+$("#tevaluasivendor-nxb_ketepatan_waktu").val()) + (+$("#tevaluasivendor-nxb_nc_produk").val()) + (+$("#tevaluasivendor-nxb_dampak_lingkungan").val()) + (+$("#tevaluasivendor-nxb_pemenuhan_peraturan").val()) + (+$("#tevaluasivendor-nxb_kecelakaan_kerja").val()) + (+$("#tevaluasivendor-nxb_hilang_jam_kerja").val())
                $( "span#total" ).html( total );
              '])->label(false) ?>
            </td>
            <td>
              10
            </td>
            <td>
              <?= $form->field($model, 'nxb_hilang_jam_kerja')->textInput()->label(false) ?>
            </td>
            <td>
              <?= $form->field($model, 'catatan_hilang_jam_kerja')->textArea()->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              Total Jumlah N x B
            </td>
            <td>
            </td>
            <td>
              <span id="total" class="text-red"></span>
            </td>
            <td>
            </td>
          </tr>
          <tr>
            <td>
              Hasil Penilaian
            </td>
            <td colspan="4">
              <?= $form->field($model, 'hasil_penilaian')->dropdownList(['Sangat Baik' => 'Sangat Baik', 'Baik' => 'Baik', 'Cukup' => 'Cukup', 'Kurang' => 'Kurang'],['prompt'=>'-Pilih-'])->label(false) ?>
            </td>
          </tr>
          <tr>
            <td>
              Catatan
            </td>
            <td colspan="4">
              <?= $form->field($model, 'catatan')->textInput()->textArea()->label(false) ?>
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
