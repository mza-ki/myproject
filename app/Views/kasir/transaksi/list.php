<?= $this->extend('kasir/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
    <!-- Alert -->
      <!-- Alert sukses -->
      <?php if (session()->getFlashData('message')) { ?>
        <div class="alert alert-success text-center shadow p-3" role="alert">
          <?php echo session()->getFlashData('message'); ?>
        </div>
      <?php } ?>

      <!-- Alert delete -->
      <?php if (session()->getFlashData('delete')) { ?>
        <div class="alert alert-danger text-center shadow p-3" role="alert">
          <?php echo session()->getFlashData('delete'); ?>
        </div>
      <?php } ?>
    <!-- /Alert -->
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-3"><?= $title; ?></h3>
      <a class="btn btn-success mb-3 align-self-end text-white" href="transaksi/add_view">Tambah Transaksi</a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th>Tgl. Transaksi</th>
          <th>Outlet</th>
          <th>Member</th>
          <th>Total</th>
          <th>Pembayaran</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
          foreach ($transaksi as $t) :
        ?>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $t['tgl']; ?></td>
          <td><?= $t['nama_outlet']; ?></td>
          <td><?= $t['nama']; ?></td>
          <td><?= number_format($t['total_biaya'], 2, ',', '.') ?></td>
          <td><?= $t['dibayar']; ?></td>
          <td><?= $t['status']; ?></td>
          <td>
            <div class="d-flex">
            <a href="/transaksi/detail/<?=$t['id_transaksi']?>" class="btn btn-info mr-2"><i class="fas fa-eye mr-1"></i>Detail</a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
<?= $this->endSection() ?>