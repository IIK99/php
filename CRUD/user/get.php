<?php

include '../koneksi.php';
if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($koneksi, $_GET['user_id']);
    $query = "SELECT * FROM tb_user WHERE user_id='$user_id'";
    $result = mysqli_query($koneksi, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Data tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'Parameter user_id tidak ditemukan']);
}