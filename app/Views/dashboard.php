<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Centered Dashboard Menu</title>
    <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex justify-content-center align-items-center min-vh-100">

    <div class="bg-secondary rounded p-4" style="width: 300px;">
        <h2 class="text-center mb-4">Dashboard</h2>
        <div class="nav flex-column">
            <a href="user" class="nav-link text-white d-flex align-items-center">
                <span class="me-2">👤</span> User Management
            </a>
            <a href="student" class="nav-link text-white d-flex align-items-center">
                <span class="me-2">🎓</span> Student Management
            </a>
            <a href="#" class="nav-link text-white d-flex align-items-center">
                <span class="me-2">🔒</span> Logout
            </a>
        </div>
    </div>

</body>
</html>
