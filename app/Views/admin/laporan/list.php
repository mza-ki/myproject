<?= $this->extend('admin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-3"><?= $title; ?></h3>
      <a href="/laporan/cetak_all" target="_blank" class="btn btn-info mr-2"><i class="fas fa-print mr-1"></i>Cetak</a>
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
            <a href="/laporan/cetak/<?=$t['id_transaksi']?>" target="_blank" class="btn btn-info mr-2"><i class="fas fa-print mr-1"></i>Cetak</a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <!-- Modal Hapus Outlet -->
      <?php foreach ($transaksi as $t) : ?>

        <div class="modal fade" id="delete<?= $t['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                Apakah anda yakin ingin menghapus transaksi <b><?= $t['id'] ?></b> ?

              </div>
              <div class="modal-footer">
                <a href="produk/delete/<?= $t['id']; ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
              </div>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
<?= $this->endSection() ?>