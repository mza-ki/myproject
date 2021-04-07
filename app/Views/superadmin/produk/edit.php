<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <form action="/produk/edit/<?= $produk['id'];?>" method="POST">
        <input type="hidden" name="id-produk">
        <div class="form-group">
          <label for="outlet">Cabang Outlet</label>
          <select class="form-control" id="outlet" name="id_outlet">
              <?php foreach ($outlet as $o) : ?>
                <option <?= ($produk['id_outlet'] == $o['id'])? 'selected' : '' ?> value="<?= $o['id'] ?>"><?= $o['nama_outlet'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="outlet">Jenis Cucian</label>
          <select class="form-control" id="outlet" name="jenis">
            <option <?= ($produk['jenis'] == 'kiloan')? 'selected' : ''; ?> value="kiloan">Kiloan</option>
            <option <?= ($produk['jenis'] == 'selimut')? 'selected' : ''; ?> value="selimut">Selimut</option>
            <option <?= ($produk['jenis'] == 'bed_cover')? 'selected' : ''; ?> value="bed_cover">Bed Cover</option>
            <option <?= ($produk['jenis'] == 'kaos')? 'selected' : ''; ?> value="kaos">Kaos</option>
            <option <?= ($produk['jenis'] == 'lain')? 'selected' : ''; ?> value="lain">Lain</option>
          </select>
        </div>
        <div class="form-group">
          <label for="namaPaket">Nama Paket</label>
          <textarea class="form-control" id="namaPaket" rows="3" name="nama_paket"><?= $produk['nama_paket']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" value="<?= $produk['harga']; ?>">
        </div>
        <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan Perubahan</button>
      </form>
    </div>
  </div>
<?= $this->endSection() ?>