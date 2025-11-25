<?php
$host = "localhost";   
$user = "root";       
$pass = "";           
$db   = "toko_073";  

$conn = mysqli_connect("localhost", "root", "", "toko_073");

if (!$conn) {
    echo "<h3 style='color: red;'>Koneksi gagal!</h3>";
    echo "Error: " . mysqli_connect_error();
} else {
    echo "<h3 style='color: green;'>Koneksi berhasil!</h3>";
}

mysqli_close($conn);
?>
