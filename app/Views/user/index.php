<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Welcome Juan X. Dela Cruz</h3>
        <a class="btn btn-warning btn-sm mb-3" href="<?= base_url(); ?>">Menu</a>
        <h2 class="mb-3">User List</h2>
        
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Username</th>
                    <th>Date Entry</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

<?Php $no = 1; foreach($userdata as $user): ?>

                <tr>
                    <td><?= $no ++ ?></td>
                    <td><?= $user->lastname; ?></td>
                    <td><?= $user->firstname; ?></td>
                    <td><?= $user->middlename; ?></td>
                    <td><?= $user->username; ?></td>
                    <td><?= $user->dateentry; ?></td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-warning btn-sm me-2">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </td>
                </tr>
                
<?Php endforeach; ?>

            </tbody>
        </table>
        
        <div class="text-end">
            <a class="btn btn-primary" href="user/add">Add New User</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
