<?= $this->extend('user/layout') ?>
<?= $this->section('content_area') ?>

    <div class="container mt-5">
        <h3>Welcome <?= session()->get('userdata'); ?></h3>

        <a class="btn btn-warning btn-sm mb-3" href="<?= base_url(); ?>">Menu</a>
        <h2 class="mb-3">User List</h2>
        
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
                            <a href="user/edit?id=<?= md5($user->user_id . 'edit'); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                            <a href="user/delete?id=<?= md5($user->user_id . 'delete'); ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </td>
                </tr>
                
<?Php endforeach; ?>

            </tbody>
        </table>
        
        <div class="text-end">
            <a class="btn btn-primary" href="user/add">Add New User</a>
        </div>

        <?= $this->endSection(); ?>
