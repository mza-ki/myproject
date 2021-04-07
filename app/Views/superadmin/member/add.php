<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <?php echo form_open('member/add'); ?>
        <input type="hidden" name="id">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
        </div>
        <label>Jenis Kelamin</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L" checked>
          <label class="form-check-label" for="laki-laki">
            Laki Laki
          </label>
        </div>
        <div class="form-check form-group">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
          <label class="form-check-label" for="perempuan">
            Perempuan
          </label>
        </div>
        <div class="form-group">
          <label for="telepon">Telp</label>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">+62</span>
            </div>
            <input type="text" class="form-control" id="telepon" name="tlp" requ>
          </div>
        </div>
        <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan</button>
      <?php echo form_close(); ?>
    </div>
  </div>
<?= $this->endSection() ?>