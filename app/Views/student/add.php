<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Student</title>
  <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">

  <div class="card shadow w-75">
    <div class="card-header bg-primary text-white fw-bold">
      Add New Student
    </div>

    <div class="card-body">
      <form action="<?= base_url() ?>student/add" method="post">
        <div class="mb-3">
          <label for="lastname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname" value="<?= set_value('lastname') ?>">
          <p class="text-danger">   <?= validation_show_error("lastname") ?></p>
        </div>
        <div class="mb-3">
          <label for="firstname" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstname" name="firstname" value="<?= set_value('firstname') ?>">
         <p class="text-danger">    <?= validation_show_error("firstname") ?></p>

        </div>
        <div class="mb-3">
          <label for="middlename" class="form-label">Middle Name</label>
          <input type="text" class="form-control" id="middlename" name="middlename" value="<?= set_value('middlename') ?>">
          <p class="text-danger">    <?= validation_show_error("middlename") ?></p>

        </div>
       
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success me-2">Save</button>
          <a type="button" class="btn btn-secondary" href="<?= base_url(); ?>student">Cancel</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
