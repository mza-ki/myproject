<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="\css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="\css/style.css">
  <link rel="shortcut icon" href="\images/logo.png" type="image/x-icon">
  <title>Login</title>
</head>
<body class="body-login d-flex justify-content-between align-items-center">
  <div class="col-md-4">
  <?php echo form_open('auth/login'); ?>
    <!-- Alert -->
    <!-- Jika field kosong -->
    <?php
    $errors = session()->getFlashData('errors');
    if (!empty($errors)) {
    ?>
      <div class="alert alert-danger notype text-center shadow p-3" role="alert">
        <?php foreach ($errors as $key => $value) : ?>
          <li><?= esc($value) ?></li>
        <?php endforeach; ?>
      </div>
    <?php } ?>

    <!-- Jika gagal login -->
    <?php if (session()->getFlashData('message')) { ?>
      <div class="alert alert-danger text-center shadow p-3" role="alert">
        <?php echo session()->getFlashData('message'); ?>
      </div>
    <?php } ?>

    <!-- Jika logout sukses -->
    <?php if (session()->getFlashData('logout')) { ?>
      <div class="alert alert-success text-center shadow p-3" role="alert">
        <?php echo session()->getFlashData('message'); ?>
      </div>
    <?php } ?>
    <!-- /Alert -->
    <div class="form-group mx-3">
      <label for="username" class="text-primary">Username</label>
      <input type="text" class="form-control" id="username" name="username" autofocus>
    </div>
    <div class="form-group mx-3">
      <label for="password" class="text-primary">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group mx-3">
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </div>
    <?php echo form_close(); ?>
  </div>
  <div class="image-login col-md-8 p-0 h-100">
    <span style="background-image:url('\images/login.jpg')" alt="login"></span>
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