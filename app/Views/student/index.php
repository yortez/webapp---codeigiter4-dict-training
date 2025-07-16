<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
                <h3>Welcome <?= session()->get('userdata'); ?></h3>

        <a class="btn btn-warning btn-sm mb-3" href="<?= base_url(); ?>">Menu</a>
        <h2 class="mb-3">Student List</h2>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
<?php endif; ?>
        
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Date Entry</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

<?Php $no = 1; foreach($studentdata as $student): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $student->lastname; ?></td>
                    <td><?= $student->firstname; ?></td>
                    <td><?= $student->middlename; ?></td>
                    <td><?= $student->dateentry; ?></td>
                    <td>
                        <div class="d-flex justify-content-center">
                               <a href="student/edit?id=<?= md5($student->student_id . 'edit'); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                            <a href="student/delete?id=<?= md5($student->student_id . 'delete'); ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </td>
                </tr>
<?Php endforeach; ?>
            </tbody>
        </table>
        
        <div class="text-end">
            <a class="btn btn-primary" href="student/add">Add New Student</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
