<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <?php echo form_open('user/add'); ?>
        <input type="hidden" name="id">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama_pengguna">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="text" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select class="form-control" id="role" name="role">
            <option value="">-</option>
            <option value="superadminadmin">SuperAdmin</option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
            <option value="owner">Owner</option>
          </select>
        </div>
        <div class="form-group">
          <label for="outlet">Cabang Outlet</label>
          <select class="form-control" id="outlet" name="id_outlet">
              <option value="">-</option>
              <?php foreach ($outlet as $o) : ?>
                <option value="<?= $o['id'] ?>"><?= $o['nama_outlet'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan</button>
      <?php echo form_close(); ?>
    </div>
  </div>
<?= $this->endSection() ?>