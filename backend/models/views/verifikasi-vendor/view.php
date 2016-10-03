<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TVerifikasiVendor */

$this->title = $model->tVendorCompany->name;
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Vendor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tverifikasi-vendor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_verifikasi_vendor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_verifikasi_vendor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tVendorCompany.name',
            'status_nama_perusahaan',
            'keterangan_nama_perusahaan',
            'status_alamat_perusahaan',
            'keterangan_alamat_perusahaan',
            'status_akta_pendirian',
            'keterangan_akta_pendirian',
            'status_nama_pengurus',
            'keterangan_nama_pengurus',
            'status_alamat_pengurus',
            'keterangan_alamat_pengurus',
            'status_nama_pemilik',
            'keterangan_nama_pemilik',
            'status_alamat_pemilik',
            'keterangan_alamat_pemilik',
            'status_npwp',
            'keterangan_npwp',
            'status_sp_pkp',
            'keterangan_sp_pkp',
            'status_siup',
            'keterangan_siup',
            'status_siujk',
            'keterangan_siujk',
            'status_sbu',
            'keterangan_sbu',
            'status_ijin_domisili',
            'keterangan_ijin_domisili',
            'status_tdu_tdp',
            'keterangan_tdu_tdp',
            'status_asosiasi',
            'keterangan_asosiasi',
            'status_iso_9001',
            'keterangan_iso_9001',
            'status_ohsas_18001',
            'keterangan_ohsas_18001',
            'status_iso_14001',
            'keterangan_iso_14001',
            'status_pengalaman_kerja',
            'keterangan_pengalaman_kerja',
            'status_barang_jasa',
            'keterangan_barang_jasa',
            'status_tenaga_ahli',
            'keterangan_tenaga_ahli',
            'status_daftar_alat',
            'keterangan_daftar_alat',
            'rekomendasi',
        ],
    ]) ?>

</div>
