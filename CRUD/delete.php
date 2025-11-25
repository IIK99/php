<?php
include 'koneksi.php';

// Sesuaikan parameter nim (mahasiswa.php mengirim ?nim=)
if (!isset($_GET['nim'])) {
    echo "<script>alert('NIM tidak ditemukan'); window.location.href='mahasiswa.php';</script>";
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['nim']);

$query = "DELETE FROM tb_mhs WHERE nim='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href='mahasiswa.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location.href='mahasiswa.php';</script>";
}
