<?= $this->extend('superadmin/layout\app') ?>
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
      <a class="btn btn-success mb-3 align-self-end text-white" href="user/add_view">Tambah Pengguna</a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th>Nama</th>
          <th>Outlet</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
          foreach ($user as $u) :
        ?>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $u['nama_pengguna']; ?></td>
          <td><?= $u['nama_outlet']; ?></td>
          <td><?= ucwords($u['role']); ?></td>
          <td>
            <div class="d-flex">
            <a href="\user/edit_view/<?=$u['id']?>" class="btn btn-info mr-2"><i class="fas fa-pen mr-1"></i>Edit</a>
            <form action="">
              <a data-toggle="modal" data-target="#delete<?= $u['id'] ?>" class="btn btn-danger mr-2 text-light"><i class="fas fa-trash text-light mr-1"></i>Delete</a>
            </form>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>

  <!-- Modal Hapus Outlet -->
      <?php foreach ($user as $u) : ?>

        <div class="modal fade" id="delete<?= $u['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                Apakah anda yakin ingin menghapus user <b><?= $u['nama_pengguna'] ?></b> ?

              </div>
              <div class="modal-footer">
                <a href="user/delete/<?= $u['id']; ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
              </div>

            </div>
          </div>
        </div>

    <?php endforeach; ?>
<?= $this->endSection() ?>