<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">

    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <?php echo form_open('produk/add'); ?>
        <input type="hidden" name="id">
        <div class="form-group">
          <label for="outlet">Cabang Outlet</label>
          <select class="form-control" id="outlet" name="id_outlet">
            <option value="">-</option>
              <?php foreach ($outlet as $o) : ?>
                <option value="<?= $o['id'] ?>"><?= $o['nama_outlet'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="outlet">Jenis Cucian</label>
          <select class="form-control" id="outlet" name="jenis">
            <option value="">-</option>
            <option value="kiloan">Kiloan</option>
            <option value="selimut">Selimut</option>
            <option value="bed_cover">Bed Cover</option>
            <option value="kaos">Kaos</option>
            <option value="lain">Lain</option>
          </select>
        </div>
        <div class="form-group">
          <label for="namPaket">Nama Paket</label>
          <textarea class="form-control" id="namaPaket" rows="3" name="nama_produk" required></textarea>
        </div>
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Tambah Product</button>
      <?php echo form_close(); ?>
    </div>
  </div>
<?= $this->endSection() ?>