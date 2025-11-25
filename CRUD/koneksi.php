<?php

$server = "localhost";
$username = "root";
$password = "Ikmal.1099";
$database = "crud_php";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil";
}
?>
