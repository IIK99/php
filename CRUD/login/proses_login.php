<?php

include '../koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);
$cek = mysqli_num_rows($result);
if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:../index.php");
} else {
    header("location:../login.php?pesan=gagal");
}