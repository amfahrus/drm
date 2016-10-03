<?php
$data_utama = ($route == 'drm/data-utama' || $controller == 'vendor-company' || $controller == 'vendor-site' || $controller == 'contact-person') ? true : false;
$data_legal = ($route == 'drm/data-legal' || $controller == 'akta-pendirian' || $controller == 'domisili-perusahaan' || $controller == 'npwp' || $controller == 'siup' || $controller == 'izin-lain') ? true : false;
$pengurus_perusahaan = ($route == 'drm/pengurus-perusahaan' || $controller == 'dewan-komisaris' || $controller == 'dewan-direksi' || $controller == 'pemilik') ? true : false;
$data_keuangan = ($route == 'drm/data-keuangan' || $controller == 'rekening-bank' || $controller == 'modal' || $controller == 'laporan-keuangan') ? true : false;
$barang_jasa = ($route == 'drm/barang-jasa' || $controller == 'barang' || $controller == 'jasa') ? true : false;
$sdm = ($route == 'drm/sdm' || $controller == 'utama' || $controller == 'pendukung') ? true : false;
$sertifikasi = ($route == 'drm/sertifikasi' || $controller == 'sertifikat') ? true : false;
$fasilitas_peralatan = ($route == 'drm/fasilitas-peralatan' || $controller == 'fasilitas-peralatan') ? true : false;
$pengalaman_proyek = ($route == 'drm/pengalaman-proyek' || $controller == 'pengalaman-proyek') ? true : false;
$data_tambahan = ($route == 'drm/data-tambahan' || $controller == 'data-tambahan') ? true : false;

?>
<style>
.dataRekanan .btn{
    white-space:normal !important;
    word-wrap:break-word;
    font-size: 11px;
    height: 50px;
}
</style>
<div class="panel panel-primary">
  <div class="panel-heading">Data Rekanan</div>
  <div class="panel-body">
    <div class="dataRekanan btn-group btn-group-justified" role="group" aria-label="Menu Data Rekanan">
      <div class="btn-group" role="group">
        <a href="/drm/data-utama?id=<?= $id ?>#detail" class="btn btn-default <?= $data_utama ? 'active' : '' ?>">Data Utama</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/data-legal?id=<?= $id ?>#detail" class="btn btn-default <?= $data_legal ? 'active' : '' ?>">Data Legal</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/pengurus-perusahaan?id=<?= $id ?>#detail" class="btn btn-default <?= $pengurus_perusahaan ? 'active' : '' ?>">Pengurus Perusahaan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/data-keuangan?id=<?= $id ?>#detail" class="btn btn-default <?= $data_keuangan ? 'active' : '' ?>">Data Keuangan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/barang-jasa?id=<?= $id ?>#detail" class="btn btn-default <?= $barang_jasa ? 'active' : '' ?>">Barang / Jasa</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/sdm?id=<?= $id ?>#detail" class="btn btn-default <?= $sdm ? 'active' : '' ?>">SDM</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/sertifikasi?id=<?= $id ?>#detail" class="btn btn-default <?= $sertifikasi ? 'active' : '' ?>">Sertifikasi</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/fasilitas-peralatan?id=<?= $id ?>#detail" class="btn btn-default <?= $fasilitas_peralatan ? 'active' : '' ?>">Fasilitas / Peralatan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/pengalaman-proyek?id=<?= $id ?>#detail" class="btn btn-default <?= $pengalaman_proyek ? 'active' : '' ?>">Pengalaman Proyek</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/data-tambahan?id=<?= $id ?>#detail" class="btn btn-default <?= $data_tambahan ? 'active' : '' ?>">Data Tambahan</a>
      </div>
    </div>
  </div>
</div>

<?php
$routes = array("drm/vendor-company", "drm/vendor-site", "drm/vendor-site-view", "drm/contact-person", "drm/contact-person-view");

if($data_utama || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Data Utama</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Utama">
      <div class="btn-group" role="group">
        <a href="/drm/vendor-company?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/vendor-company' ? 'active' : '' ?>">Nama Perusahaan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/vendor-site?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/vendor-site'  || $route == 'drm/vendor-site-view' ? 'active' : '' ?>">Alamat Perusahaan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/contact-person?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/contact-person'  || $route == 'drm/contact-person-view' ? 'active' : '' ?>">Kontak Person</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/akta-pendirian", "drm/akta-pendirian-view", "drm/domisili-perusahaan", "drm/domisili-perusahaan-view", "drm/npwp", "drm/npwp-view", "drm/siup", "drm/siup-view", "drm/izin-lain", "drm/izin-lain-view");

if($data_legal || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Data Legal</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Legal">
      <div class="btn-group" role="group">
        <a href="/drm/akta-pendirian?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/akta-pendirian'  || $route == 'drm/akta-pendirian-view' ? 'active' : '' ?>">Akta Pendirian</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/domisili-perusahaan?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/domisili-perusahaan'  || $route == 'drm/domisili-perusahaan-view' ? 'active' : '' ?>">Domisili Perusahaan</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/npwp?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/npwp'  || $route == 'drm/npwp-view' ? 'active' : '' ?>">NPWP</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/siup?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/siup'  || $route == 'drm/siup-view' ? 'active' : '' ?>">SIUP</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/izin-lain?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/izin-lain'  || $route == 'drm/izin-lain-view' ? 'active' : '' ?>">Izin lainnya</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/dewan-komisaris", "drm/dewan-komisaris-view", "drm/dewan-direksi", "drm/dewan-direksi-view", "drm/pemilik", "drm/pemilik-view");

if($pengurus_perusahaan || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Pengurus Perusahaan</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Pengurus Perusahaan">
      <div class="btn-group" role="group">
        <a href="/drm/dewan-komisaris?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/dewan-komisaris'  || $route == 'drm/dewan-komisaris-view' ? 'active' : '' ?>">Dewan Komisaris</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/dewan-direksi?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/dewan-direksi'  || $route == 'drm/dewan-direksi-view' ? 'active' : '' ?>">Dewan Direksi</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/pemilik?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/pemilik'  || $route == 'drm/pemilik-view' ? 'active' : '' ?>">Pemilik</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/rekening-bank", "drm/rekening-bank-view", "drm/modal", "drm/laporan-keuangan", "drm/laporan-keuangan-view");

 if($data_keuangan || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Data Keuangan</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Keuangan">
      <div class="btn-group" role="group">
        <a href="/drm/rekening-bank?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/rekening-bank'  || $route == 'drm/rekening-bank-view' ? 'active' : '' ?>">Rekening Bank</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/modal?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/modal' ? 'active' : '' ?>">modal</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/laporan-keuangan?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/laporan-keuangan'  || $route == 'drm/laporan-keuangan-view' ? 'active' : '' ?>">Laporan Keuangan</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/barang", "drm/barang-view", "drm/jasa", "drm/jasa-view");

 if($barang_jasa || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Barang/Jasa</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Barang Jasa">
      <div class="btn-group" role="group">
        <a href="/drm/barang?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/barang'  || $route == 'drm/barang-view' ? 'active' : '' ?>">Barang</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/jasa?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/jasa'  || $route == 'drm/jasa-view' ? 'active' : '' ?>">Jasa</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/utama", "drm/utama-view", "drm/pendukung", "drm/pendukung-view");

if($sdm || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Tenaga Ahli</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu SDM">
      <div class="btn-group" role="group">
        <a href="/drm/utama?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/utama'  || $route == 'drm/utama-view' ? 'active' : '' ?>">Utama</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/drm/pendukung?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/pendukung'  || $route == 'drm/pendukung-view' ? 'active' : '' ?>">Pendukung</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/sertifikat", "drm/sertifikat-view");

if($sertifikasi || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Sertifikasi</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Sertifikasi">
      <div class="btn-group" role="group">
        <a href="/drm/sertifikat?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/sertifikat'  || $route == 'drm/sertifikat-view' ? 'active' : '' ?>">Sertifikat</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/fasilitas", "drm/fasilitas-view");

 if($fasilitas_peralatan || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Fasilitas/Peralatan</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Fasilitas/Peralatan">
      <div class="btn-group" role="group">
        <a href="/drm/fasilitas?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/fasilitas'  || $route == 'drm/fasilitas-view' ? 'active' : '' ?>">Fasilitas/Peralatan</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/pengalaman", "drm/pengalaman-view");

if($pengalaman_proyek || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Pengalaman Proyek</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Pengalaman Proyek">
      <div class="btn-group" role="group">
        <a href="/drm/pengalaman?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/pengalaman'  || $route == 'drm/pengalaman-view' ? 'active' : '' ?>">Pengalaman Proyek</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
$routes = array("drm/tambahan", "drm/tambahan-view");

if($data_tambahan || in_array($route, $routes)){ ?>
<div class="panel panel-success">
  <div class="panel-heading">Data Tambahan</div>
  <div class="panel-body">
    <div class="btn-group btn-group-lg" role="group" aria-label="Menu Data Tambahan">
      <div class="btn-group" role="group">
        <a href="/drm/tambahan?id=<?= $id ?>#detail" class="btn btn-default <?= $route == 'drm/tambahan'  || $route == 'drm/tambahan-view' ? 'active' : '' ?>">Data Tambahan</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
