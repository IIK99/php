<?php include 'partial/header.php'; ?>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <header class="py-12">
                        <h1 class="text-center">Data Mahasiswa</h1>
                        <div class="text-end">
                            <a href="tambah.php" class="btn btn-primary mb-4">Tambah Data</a>
                        </div>
                    </header>
                    <table class="table table-bordered w-100" id="table_mhs">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'koneksi.php';
                        $query = "SELECT * FROM tb_mhs";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while ($data = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $data['nim'] . "</td>";
                            echo "<td>" . $data['nama'] . "</td>";
                            echo "<td>" . $data['jk'] . "</td>";
                            echo "<td>" . $data['tgl_lahir'] . "</td>";
                            echo "<td>" . $data['jurusan'] . "</td>";
                            echo "<td>" . $data['alamat'] . "</td>";
                            echo "<td>
                                    <a href='edit.php?nim=" . $data['nim'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete.php?nim=" . $data['nim'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#table_mhs').DataTable();
            });
        </script>
<?php include 'partial/footer.php'; ?>