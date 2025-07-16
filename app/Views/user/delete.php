<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete User</title>
  <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">

  <div class="card shadow w-75">
    <div class="card-header bg-primary text-white fw-bold">
      Delete User
    </div>

    <div class="card-body">
      <form action="<?= base_url() ?>user/delete?id=<?= set_value('user_id') ?>" method="post">

      <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= set_value('user_id') ?>" >

        <div class="mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastname" value="<?= set_value('lastname') ?>"disabled>
          <p class="text-danger">   <?= validation_show_error("lastname") ?></p>
        </div>
        <div class="mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstname" value="<?= set_value('firstname') ?>"disabled>
         <p class="text-danger">    <?= validation_show_error("firstname") ?></p>

        </div>
        <div class="mb-3">
          <label for="middleName" class="form-label">Middle Name</label>
          <input type="text" class="form-control" id="middleName" name="middlename" value="<?= set_value('middlename') ?>"disabled>
          <p class="text-danger">    <?= validation_show_error("middlename") ?></p>

        </div>
        <div class="d-flex justify-content-end">
          <p>Are you sure you want to delete this record?   </p>
          <button type="submit" class="btn btn-success me-2">Yes</button>
          <a type="button" class="btn btn-secondary" href="<?= base_url(); ?>user">No</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
