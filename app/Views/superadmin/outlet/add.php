<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <?php echo form_open('outlet/add'); ?>
        <input type="hidden" name="id">
        <div class="form-group">
          <label for="nama">Nama Outlet</label>
          <input type="text" class="form-control" id="nama" name="nama" autofocus required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
        </div>
        <div class="form-group">
          <label for="nama">Telp</label>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default" name="tlp">+62</span>
            </div>
            <input type="text" class="form-control" id="nama" name="tlp" required>
          </div>
        </div>
        <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan</button>
      <?php echo form_close(); ?>
    </div>
  </div>
<?= $this->endSection() ?>
