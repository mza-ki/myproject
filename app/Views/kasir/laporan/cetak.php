<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <center>
        <h2>DATA LAPORAN TRANSAKSI LAUNDRY APP</h2>
        <h6><?= strftime('%A %d %B %Y') ?></h6>
        <h6 class="mr-auto">Oleh : <?= session()->get('nama_pengguna') ?></h6>
        <br>
    </center>
    <table class="table table-bordered" style="width: 100%;">
        <thead>
            <tr>
              <th style="width: 3%">#</th>
              <th>Tgl. Transaksi</th>
              <th>Outlet</th>
              <th>Member</th>
              <th>Total</th>
              <th>Pembayaran</th>
              <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $i = 1;
              foreach ($transaksi as $t) : 
              ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $t['tgl']; ?></td>
                  <td><?= $t['nama_outlet']; ?></td>
                  <td><?= $t['nama']; ?></td>
                  <td><?= number_format($t['total_biaya'], 2, ',', '.') ?></td>
                  <td><?= $t['dibayar']; ?></td>
                  <td><?= $t['status']; ?></td>
                </tr>
              <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>

          