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
    <a href="/owner">Laundry App</a>  
    <nav>
      <li>
        <a href="/owner"><i class="fas fa-home mr-2"></i>Home</a>
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
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2000);
  </script>
</body>
</html>
