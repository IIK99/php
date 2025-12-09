<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project CRUD PHP</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/DataTables-1.13.3/css/jquery.dataTables.min.css">
    <script src="assets/jquery-3.6.1.js"></script>
    <script src="assets/DataTables-1.13.3/js/jquery.dataTables.min.js"></script>
</head>
<style>
    html, body {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;

        .navbar {
            z-index: 1030;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 56px;
            left: 0;
            background-color: #3a3a3aff;
            color: white;
            padding-top: 15px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
            margin-top: 56px;
        }
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                <img src="assets/image/logo.png" alt="" height="50px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"></span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link text-dark">Welcome Back, <?php echo $_SESSION['username']; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar py-4">
        <a href="index.php">Dashboard</a>
        <a href="mahasiswa.php">Data Mahasiswa</a>
        <a href="user.php">Data User</a>
        <a href="login/logout.php">Logout</a>
    </div>

    <div class="main-content">