<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">

  <div class="card shadow w-75">
    <div class="card-header bg-primary text-white fw-bold">
      Edit Student
    </div>

    <div class="card-body">
      <form action="<?= base_url() ?>student/edit?id=<?= set_value('student_id') ?>" method="POST">
          <input type="hidden" class="form-control" id="student_id" name="student_id" value="<?= set_value('student_id') ?>" >
         
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
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success me-2">Update</button>
          <a type="button" class="btn btn-secondary" href="<?= base_url(); ?>student">Cancel</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
