<?php
$data_utama = ($route == 'data-vendor/data-utama' || $controller == 'vendor-company' || $controller == 'vendor-site' || $controller == 'contact-person') ? true : false;
$data_legal = ($route == 'data-vendor/data-legal' || $controller == 'akta-pendirian' || $controller == 'domisili-perusahaan' || $controller == 'npwp' || $controller == 'siup' || $controller == 'izin-lain') ? true : false;
$pengurus_perusahaan = ($route == 'data-vendor/pengurus-perusahaan' || $controller == 'dewan-komisaris' || $controller == 'dewan-direksi' || $controller == 'pemilik') ? true : false;
$data_keuangan = ($route == 'data-vendor/data-keuangan' || $controller == 'rekening-bank' || $controller == 'modal' || $controller == 'laporan-keuangan') ? true : false;
$barang_jasa = ($route == 'data-vendor/barang-jasa' || $controller == 'barang' || $controller == 'jasa') ? true : false;
$sdm = ($route == 'data-vendor/sdm' || $controller == 'utama' || $controller == 'pendukung') ? true : false;
$sertifikasi = ($route == 'data-vendor/sertifikasi' || $controller == 'sertifikat') ? true : false;
$fasilitas_peralatan = ($route == 'data-vendor/fasilitas-peralatan' || $controller == 'fasilitas-peralatan') ? true : false;
$pengalaman_proyek = ($route == 'data-vendor/pengalaman-proyek' || $controller == 'pengalaman-proyek') ? true : false;
$data_tambahan = ($route == 'data-vendor/data-tambahan' || $controller == 'data-tambahan') ? true : false;

?>
<style>
.dataRekanan .btn{
    white-space:normal !important;
    word-wrap:break-word;
    font-size: 11px;
    height: 45px;
}
</style>
<div class="panel panel-default">
  <div class="panel-heading">Data Rekanan</div>
  <div class="panel-body">
    <div class="dataRekanan btn-group btn-group-justified" role="group" aria-label="Menu Data Rekanan">
      <div class="btn-group" role="group">
        <a href="/data-vendor/data-utama" class="btn btn-default <?= $data_utama ? 'active' : '' ?>">Data Utama</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/data-legal" class="btn btn-default <?= $data_legal ? 'active' : '' ?>">Data Legal</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/pengurus-perusahaan" class="btn btn-default <?= $pengurus_perusahaan ? 'active' : '' ?>">Pengurus Perusahaan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/data-keuangan" class="btn btn-default <?= $data_keuangan ? 'active' : '' ?>">Data Keuangan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/barang-jasa" class="btn btn-default <?= $barang_jasa ? 'active' : '' ?>">Barang / Jasa</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/sdm" class="btn btn-default <?= $sdm ? 'active' : '' ?>">SDM</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/sertifikasi" class="btn btn-default <?= $sertifikasi ? 'active' : '' ?>">Sertifikasi</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/fasilitas-peralatan" class="btn btn-default <?= $fasilitas_peralatan ? 'active' : '' ?>">Fasilitas / Peralatan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/pengalaman-proyek" class="btn btn-default <?= $pengalaman_proyek ? 'active' : '' ?>">Pengalaman Proyek</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/data-vendor/data-tambahan" class="btn btn-default <?= $data_tambahan ? 'active' : '' ?>">Data Tambahan</a>
      </div>
    </div>

    <?php if($data_utama){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Data Utama</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Utama">
          <div class="btn-group" role="group">
            <a href="/vendor-company/index" class="btn btn-default <?= $controller == 'vendor-company' ? 'active' : '' ?>">Nama Perusahaan</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/vendor-site/index" class="btn btn-default <?= $controller == 'vendor-site' ? 'active' : '' ?>">Alamat Perusahaan</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/contact-person/index" class="btn btn-default <?= $controller == 'contact-person' ? 'active' : '' ?>">Kontak Person</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($data_legal){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Data Legal</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Legal">
          <div class="btn-group" role="group">
            <a href="/akta-pendirian/index" class="btn btn-default <?= $controller == 'akta-pendirian' ? 'active' : '' ?>">Akta Pendirian</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/domisili-perusahaan/index" class="btn btn-default <?= $controller == 'domisili-perusahaan' ? 'active' : '' ?>">Domisili Perusahaan</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/npwp/index" class="btn btn-default <?= $controller == 'npwp' ? 'active' : '' ?>">NPWP</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/siup/index" class="btn btn-default <?= $controller == 'siup' ? 'active' : '' ?>">SIUP</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/izin-lain/index" class="btn btn-default <?= $controller == 'izin-lain' ? 'active' : '' ?>">Izin lainnya</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($pengurus_perusahaan){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Pengurus Perusahaan</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Pengurus Perusahaan">
          <div class="btn-group" role="group">
            <a href="/dewan-komisaris/index" class="btn btn-default <?= $controller == 'dewan-komisaris' ? 'active' : '' ?>">Dewan Komisaris</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/dewan-direksi/index" class="btn btn-default <?= $controller == 'dewan-direksi' ? 'active' : '' ?>">Dewan Direksi</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/pemilik/index" class="btn btn-default <?= $controller == 'pemilik' ? 'active' : '' ?>">Pemilik</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($data_keuangan){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Data Keuangan</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Keuangan">
          <div class="btn-group" role="group">
            <a href="/rekening-bank/index" class="btn btn-default <?= $controller == 'rekening-bank' ? 'active' : '' ?>">Rekening Bank</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/modal/index" class="btn btn-default <?= $controller == 'modal' ? 'active' : '' ?>">modal</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/laporan-keuangan/index" class="btn btn-default <?= $controller == 'laporan-keuangan' ? 'active' : '' ?>">Laporan Keuangan</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($barang_jasa){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Barang/Jasa</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Barang Jasa">
          <div class="btn-group" role="group">
            <a href="/barang/index" class="btn btn-default <?= $controller == 'barang' ? 'active' : '' ?>">Barang</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/jasa/index" class="btn btn-default <?= $controller == 'jasa' ? 'active' : '' ?>">Jasa</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($sdm){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Tenaga Ahli</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu SDM">
          <div class="btn-group" role="group">
            <a href="/utama/index" class="btn btn-default <?= $controller == 'utama' ? 'active' : '' ?>">Utama</a>
          </div>
          <div class="btn-group" role="group">
            <a href="/pendukung/index" class="btn btn-default <?= $controller == 'pendukung' ? 'active' : '' ?>">Pendukung</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($sertifikasi){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Sertifikasi</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Sertifikasi">
          <div class="btn-group" role="group">
            <a href="/sertifikat/index" class="btn btn-default <?= $controller == 'sertifikat' ? 'active' : '' ?>">Sertifikat</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($fasilitas_peralatan){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Fasilitas/Peralatan</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Fasilitas/Peralatan">
          <div class="btn-group" role="group">
            <a href="/fasilitas-peralatan/index" class="btn btn-default <?= $controller == 'fasilitas-peralatan' ? 'active' : '' ?>">Fasilitas/Peralatan</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($pengalaman_proyek){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Pengalaman Proyek</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Pengalaman Proyek">
          <div class="btn-group" role="group">
            <a href="/pengalaman-proyek/index" class="btn btn-default <?= $controller == 'pengalaman-proyek' ? 'active' : '' ?>">Pengalaman Proyek</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if($data_tambahan){ ?>
    <div class="panel panel-default">
      <!--<div class="panel-heading">Data Tambahan</div>-->
      <div class="panel-body">
        <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Tambahan">
          <div class="btn-group" role="group">
            <a href="/data-tambahan/index" class="btn btn-default <?= $controller == 'data-tambahan' ? 'active' : '' ?>">Data Tambahan</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>


  </div>
</div>
