<?php

include '../koneksi.php';

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "INSERT INTO tb_user (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "Data berhasil disimpan";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}