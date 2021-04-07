<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
<div class="content">
  <div class="product-list d-flex flex-column pt-3 px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <form action="/outlet/edit/<?= $outlet['id'];?>" method="POST"> 
      <?= csrf_field(); ?>
          <div class="form-group">
              <label for="nama">Nama Outlet</label>
              <input type="text" class="form-control" value="<?= $outlet['nama_outlet'] ?>" id="nama" name="nama" required>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= $outlet['alamat_outlet']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="nama">Telp</label>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">+62</span>
                </div>
                <input type="text" class="form-control" value="<?= $outlet['tlp_outlet'] ?>" id="nama" name="tlp" required>
              </div>
            </div>
            <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan Perubahan</button>
      </form>
    </div>
  </div>
<?= $this->endSection() ?>
