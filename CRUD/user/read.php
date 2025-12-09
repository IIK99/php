<?php
include '../koneksi.php';
$query = "SELECT * FROM tb_user";
$result = mysqli_query($koneksi, $query);
$no = 1;

while ($data = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $no++ . "</td>";
    echo "<td>" . $data['username'] . "</td>";
    echo "<td>" . $data['password'] . "</td>";
    echo "<td>
            <button data-id='" . $data['user_id'] . "' class='btn btn-warning btn-sm'>Edit</button>
            <button data-id='" . $data['user_id'] . "' class='btn btn-danger btn-sm deleteBtn' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">Hapus</button>
          </td>";
    echo "</tr>";
    $no++;
}