<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">

  <div class="card shadow w-75">
    <div class="card-header bg-primary text-white fw-bold">
      Edit User
    </div>

    <div class="card-body">
      <form action="<?= base_url() ?>user/edit?id=<?= set_value('user_id') ?>" method="post">

      <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= set_value('user_id') ?>" >

        <div class="mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastname" value="<?= set_value('lastname') ?>">
          <p class="text-danger">   <?= validation_show_error("lastname") ?></p>
        </div>
        <div class="mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstname" value="<?= set_value('firstname') ?>">
         <p class="text-danger">    <?= validation_show_error("firstname") ?></p>

        </div>
        <div class="mb-3">
          <label for="middleName" class="form-label">Middle Name</label>
          <input type="text" class="form-control" id="middleName" name="middlename" value="<?= set_value('middlename') ?>">
          <p class="text-danger">    <?= validation_show_error("middlename") ?></p>

        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>">
          <p class="text-danger">   <?= validation_show_error("username") ?></p>

        </div>
        <div class="mb-3">
          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword5" name="password" value="<?= set_value('password') ?>">
          <p class="text-danger">    <?= validation_show_error("password") ?></p>

        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value="<?= set_value('confirmpassword') ?>">
          <p class="text-danger">    <?= validation_show_error("confirmpassword") ?></p>

        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success me-2">Update</button>
          <a type="button" class="btn btn-secondary" href="<?= base_url(); ?>user">Cancel</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
