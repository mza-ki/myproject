<?= $this->extend('admin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <form action="/user/edit/<?= $user['id'];?>" method="POST"> 
      <?= csrf_field(); ?>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama_pengguna" value="<?= $user['nama_pengguna'] ?>">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="text" name="username" value="<?= $user['username'] ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?= $user['password'] ?>">
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select name="role" class="form-control">
            <option <?= ($user['role'] == 'admin')? 'selected' : '' ?> value="admin">Admin</option>
            <option <?= ($user['role'] == 'kasir')? 'selected' : '' ?> value="kasir">Kasir</option>
            <option <?= ($user['role'] == 'owner')? 'selected' : '' ?> value="owner">Owner</option>
          </select>
        </div>
        <div class="form-group">
          <label for="outlet">Cabang Outlet</label>
          <select class="form-control" id="outlet" name="id_outlet" readonly>
                <option value="<?= $outlet['id'] ?>"><?= $outlet['nama_outlet'] ?></option>
          </select>
        </div>
        <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan Perubahan</button>
      </form>
    </div>
  </div>
<?= $this->endSection() ?>