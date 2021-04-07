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
        <a class="btn btn-success mb-3 align-self-end text-white" href="member/add_view">Tambah Member</a>
      </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
          foreach ($member as $m) :
        ?>
        <tr>
          <th scope="row"><?=$i++?></th>
          <td><?= $m['nama']; ?></td>
          <td><?= $m['alamat']; ?></td>
          <td><?= $m['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan';  ?></td>
          <td><?= '+62'.$m['tlp']; ?></td>
          <td>
            <div class="d-flex">
            <a href="/member/edit_view/<?= $m['id'] ?>" class="btn btn-info mr-2"><i class="fas fa-pen mr-1"></i>Edit</a>
              <a data-toggle="modal" data-target="#delete<?= $m['id'] ?>" type="submit" class="btn btn-danger text-light">
                <i class="fas fa-trash text-light mr-1"></i>Delete
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>

  <!-- Modal Hapus Member -->
      <?php foreach ($member as $m) : ?>

        <div class="modal fade" id="delete<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                Apakah anda yakin ingin menghapus member <b><?= $m['nama'] ?></b> ?

              </div>
              <div class="modal-footer">
                <a href="member/delete/<?= $m['id']; ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
              </div>

            </div>
          </div>
        </div>

    <?php endforeach; ?>

<?= $this->endSection() ?>