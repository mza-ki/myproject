<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <form action="/transaksi/simpan/<?= $transaksi['id_transaksi']; ?>" method="POST">
      <?= csrf_field(); ?>
        <input type="hidden" name="id_member" value="<?= $transaksi['id_member']; ?>">
        <input type="hidden" name="biaya_tambahan" value="<?= $transaksi['biaya_tambahan']; ?>">
        <input type="hidden" name="diskon" value="<?= $transaksi['diskon']; ?>">
        <input type="hidden" name="pajak" value="<?= $transaksi['pajak']; ?>">
        <input type="hidden" name="total_biaya" value="<?= $transaksi['total_biaya']; ?>">
        <div class="form-group">
          <label for="nama">Kode Invoice</label>
          <input type="text" class="form-control" id="nama" name="kode_invoice" readonly value="<?=$transaksi['kode_invoice']; ?>">
        </div>  
        <div class="form-group">
          <label for="member">Member</label>
          <input class="form-control" type="text" readonly value="<?=$transaksi['nama']; ?>">
        </div>
        <input type="hidden" name="tgl" value="<?=$transaksi['tgl']; ?>">
        <div class="form-group">
          <label for="tglSelesai">Tanggal Selesai</label>
          <input class="form-control" type="text" readonly name="batas_waktu" value="<?=$transaksi['batas_waktu']; ?>">
        </div>
        <div class="form-group">
          <label for="tglBayar">Tanggal Bayar</label>
          <input type="datetime-local" class="form-control" id="tglSelesai" name="tgl_bayar">
          <small class="form-text text-muted"><b class="text-danger">*</b> Boleh dikosongkan jika belum dibayar</small>
        </div>
        <div class="form-group">
          <label for="pembayaran">Pembayaran</label>
          <select class="form-control" id="pembayaran" name="dibayar">
            <option <?= $transaksi['dibayar'] == 'dibayar'? 'selected' : ''; ?> value="dibayar">Dibayar</option>
            <option <?= $transaksi['dibayar'] == 'belum_dibayar'? 'selected' : ''; ?> value="belum_dibayar">Belum Dibayar</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status">
            <option <?= $transaksi['status'] == 'baru'? 'selected' : ''; ?> value="baru">Baru</option>
            <option <?= $transaksi['status'] == 'proses'? 'selected' : ''; ?> value="proses">Proses</option>
            <option <?= $transaksi['status'] == 'selesai'? 'selected' : ''; ?> value="selesai">Selesai</option>
            <option <?= $transaksi['status'] == 'diambil'? 'selected' : ''; ?> value="diambil">Diambil</option>
          </select>
        </div>
       <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan Perubahan</button>
      </form>
  </div>
<?= $this->endSection() ?>