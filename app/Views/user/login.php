<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow w-25">

  <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger mb-3">
                <?= session()->getFlashdata('error'); ?>
            </div>
<?php endif; ?>

    <div class="card-header bg-primary text-white fw-bold">
      Authentication Access
    </div>

    <div class="card-body">
      <form action="<?= base_url(); ?>login" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" >
            <p class="text-danger">   <?= validation_show_error("username") ?></p>
        </div>
        <div class="mb-3">
          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword5" name="password" >
            <p class="text-danger">   <?= validation_show_error("password") ?></p>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success me-2">Login</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
