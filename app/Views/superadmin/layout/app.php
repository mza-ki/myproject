<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="\css/bootstrap.css">
  <link rel="shortcut icon" href="\images/logo.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="\css/style.css">
  <link rel="stylesheet" type="text/css" href="\css/all.css">
  <title><?= $title; ?></title>
</head>
<body>
  <div class="side-menu">
    <a href="/superadmin">Laundry App</a>  
    <nav>
      <li>
        <a href="/superadmin"><i class="fas fa-home mr-2"></i>Home</a>
      </li>
      <li>
        <a href="/produk"><i class="fas fa-box mr-2"></i>Produk</a>
      </li>
      <li>
        <a href="/user"><i class="fas fa-user-tie mr-2"></i>Pengguna</a>
      </li>
      <li>
        <a href="/outlet"><i class="fas fa-store mr-2"></i>Outlet</a>
      </li>
      <li>
        <a href="/member"><i class="fas fa-user mr-2"></i>Member</a>
      </li>
      <li>
        <a href="/transaksi"><i  class="fas fa-handshake mr-2"></i>Transaksi</a>
      </li>
      <li>
        <a href="/laporan"><i  class="fas fa-print mr-2"></i>Laporan</a>
      </li>
    </nav>
  </div>
  <div class="content">
    <header class="d-flex justify-content-between align-items-center">
      <button class="navbar">
        <i class="fas fa-bars"></i>
      </button>
      <!-- Right navbar links -->
      <ul class="navbar-nav m-0 text-light">
        <?php if (!session()->get('username') == "") { ?>

          <!-- User Menu -->
          <li class="nav-item dropdown btn-login-style">
            <a class="nav-link" data-toggle="dropdown">
              <span class="mr-2 d-none d-lg-inline text-gray-600"><?= session()->get('nama_pengguna'); ?> (<?= session()->get('role') ?>)</span>
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm-right text-center bg-primary">
              <a href="/auth/logout" class="dropdown-item text-light btn-logout-style">
                <i class="fas fa-sign-out-alt text-light"></i>
                Keluar
              </a>
            </div>
          </li>

        <?php } else { ?>

          <li class="nav-item">
            <a class="nav-link btn-login-style" href="/auth" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-sign-in-alt"></i>
              Login
            </a>
          </li>

        <?php } ?>
      </ul>
    </header>
    <?= $this->renderSection('content') ?>
  </div>
  <script src="\js/jquery.js"></script>
  <script src="\js/bootstrap.bundle.js"></script>
  <script>
    const base_url = '<?= base_url() ?>'

    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2000);

    function getSubTotal() {
      let total_biaya = 0;
      $(document).find('.total_harga').each((index, element) => {
        total_biaya += Number($(element).val());
      });

      return total_biaya;
    }

    $('.btn-tambah-det').click((e) => {
      e.preventDefault();
      id_paket = $('.id_paket').val();
      qty = $('.qty').val();

      $.get(base_url + '/produk/' + id_paket, (response) => {
        const data = JSON.parse(response);
        const find = $(document).find('tr[data-id="' + data.id_paket + '"]');
        console.log(data);
        if (find.length == 0) {
          $('.paket').append(
            `
            <tr data-id="${data.id}">
              <input type="hidden" name="id_paket[]" value="${data.id}">
              <td>${data.nama_paket}</td>
              <td>${data.harga}</td>
              <td>
                <input readonly class="form-control" name="qty[]" value="${qty}">
              </td>
              <td>
                <input readonly class="form-control total_harga" name="total_harga[]" value="${data.harga * qty}">
              </td>
              <td>
                <div class="text-center">
                  <a class="btn btn-danger btn-sm btn-hapus">
                    <i class="fas fa-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
            `
          );
        }

        $('.total_biaya').val(getSubTotal());
      });
    });

    $(document).on('click', '.btn-hapus', function() {
      $(this).closest('tr').remove();
      $('.total_bayar').val(getSubTotal());
    });

    $('.biaya_tambahan').keyup(() => {
      biaya_tambahan = $('.biaya_tambahan').val();
      total_biaya = getSubTotal();

      $('.total_biaya').val(Number(total_biaya) + (Number(biaya_tambahan)))
    });

    $('.pajak').keyup(() => {
      pajak = $('.pajak').val();
      total_biaya = getSubTotal();
      ppajak = (Number(pajak) / 100) * Number(total_biaya)

      $('.total_biaya').val(Number(total_biaya) + Number(ppajak))
    });

    $('.diskon').keyup(() => {
      diskon = $('.diskon').val();
      pajak = $('.pajak').val();
      total_biaya = getSubTotal();

      pdiskon = (Number(diskon) / 100) * Number(total_biaya)

      $('.total_biaya').val(Number(total_biaya) + Number(ppajak) - Number(pdiskon))
    });
  </script>
</body>
</html>
