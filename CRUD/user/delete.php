<?php

include '../koneksi.php';
if ($_POST) {
    $user_id = $_POST['user_id'];
    $query = "DELETE FROM tb_user WHERE user_id='$user_id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "Parameter user_id tidak ditemukan";
}