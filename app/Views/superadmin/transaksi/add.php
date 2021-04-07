<?= $this->extend('superadmin/layout\app') ?>
<?= $this->section('content') ?>
  <div class="content">
    <div class="product-list d-flex flex-column pt-3 px-3">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3"><?= $title; ?></h3>
      </div>
      <?php echo form_open('transaksi/add'); ?>
        <?php 
          $kode = 'MDN' . '0' . session()->get('id_outlet') . date('Ymdis');
        ?>

        <div class="form-group">
          <label for="nama">Kode Invoice</label>
          <input type="text" class="form-control" id="nama" name="kode_invoice" readonly value="<?= $kode ?>">
        </div>  
        <div class="form-group">
          <label for="member">Member</label>
          <select class="form-control" id="member" name="id_member">
            <option value="">-</option>
              <?php foreach ($member as $m) : ?>
                <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="tglSelesai">Tanggal Selesai</label>
          <input type="datetime-local" class="form-control" id="tglSelesai" name="batas_waktu" required>
        </div>
        <div class="form-group">
          <input type="hidden" name="status" value="baru">
        </div>
        <div class="form-group">
          <label for="pembayaran">Pembayaran</label>
          <select class="form-control" id="pembayaran" name="dibayar">
            <option value="">-</option>
            <option value="dibayar">dibayar</option>
            <option value="belum_dibayar">belum dibayar</option>
          </select>
        </div>
        <div class="form-group">
          <div class="card-header">
            <div class="row justify-content-end">
              <div class="d-flex align-items-center col-4">
                <label class="mr-2 pt-2">Paket</label>
                <div class="input-group">
                  <select name="id_paket" class="item-paket form-control form-control-sm id_paket" required>
                    <option value="">-</option>
                    <?php foreach ($paket as $p) : ?>
                      <option value="<?= $p['id']; ?>"><?= $p['nama_paket']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="d-flex align-items-center col-2">
                <label class="mr-2 pt-1">Qty</label>
                <div class="input-group">
                  <input type="number" name="qty" class="form-control form-control-sm qty" required>
                </div>
              </div>
              <div class="card-tools text-right">
                <a class="btn-tambah-det d-none d-sm-inline-block btn btn-sm btn-outline-dark shadow-sm bg-dark text-light">
                  <i class="fa fa-plus mr-2"></i>Tambah Paket
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
              <table class="table table-striped tabel-paket">
                <thead>
                  <tr>
                    <th>Nama Paket</th>
                    <th>@</th>
                    <th style="width: 10%">Qty</th>
                    <th style="width: 20%;">Harga</th>
                    <th style="max-width: 5%"></th>
                  </tr>
                </thead>
                <tbody class="paket">

                </tbody>
              </table>
            </div>
        </div>
        <div class="form-group">
          <div class="card-body">

            <div class="row">
              <div class="d-flex col-4">
                <div class="col-form-label">
                  <label class="form-label small">Biaya Tambahan</label>
                </div>
                <div class="col-8">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input name="biaya_tambahan" class="form-control biaya_tambahan">
                  </div>
                </div>
              </div>
              <div class="d-flex col-2">
                <div class="col-form-label">
                  <label class="form-label small mr-3">Pajak</label>
                </div>
                <div class="">
                  <div class="input-group">
                    <input name="pajak" class="form-control pajak">
                    <div class="input-group-append">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex col-2">
                <div class="col-form-label">
                  <label class="form-label small mr-3">Diskon</label>
                </div>
                <div class="">
                  <div class="input-group">
                    <input name="diskon" class="form-control diskon">
                    <div class="input-group-append">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex col-4">
                <div class="col-form-label">
                  <label class="form-label small mr-3">Total</label>
                </div>
                <div class="">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input name="total_biaya" type="text" class="form-control bg-light total_biaya" readonly>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
        <button class="btn btn-success mb-3 align-self-end text-white" type="submit">Simpan</button>
      <?php echo form_close(); ?>
  </div>
<?= $this->endSection() ?>