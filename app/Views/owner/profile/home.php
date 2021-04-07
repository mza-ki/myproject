<?= $this->extend('owner/layout\app') ?>
<?= $this->section('content') ?>
<div class="product-list position-relative ">
  <div class="pt-5 pl-5">
    <h1 class="col-12">Hai <span><?= session()->get('nama_pengguna') == null ? 'Gaes' : session()->get('nama_pengguna') ?></span></h1>
    <h3 class="col-12"> Selamat Datang di Laundry App</h3>
  </div>
  <img class="col-12 image-dashboard" src="\images/laundry_ilustration.png" alt="laundry-illustration">
</div>
<?= $this->endSection() ?>