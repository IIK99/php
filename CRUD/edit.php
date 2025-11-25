<?php
include 'partial/header.php';
include 'koneksi.php';

// Pastikan parameter nim dikirim (sama seperti link di mahasiswa.php)
if (!isset($_GET['nim'])) {
    echo "<script>alert('NIM tidak ditemukan!'); window.location.href='mahasiswa.php';</script>";
    exit;
}

// Sanitasi input dari URL
$id = mysqli_real_escape_string($koneksi, $_GET['nim']);

// Ambil data mahasiswa
$query = "SELECT * FROM tb_mhs WHERE nim='$id'";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='mahasiswa.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($result);

// Proses Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil dan sanitasi data POST
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jk = mysqli_real_escape_string($koneksi, $_POST['jk']);
    $tgl_lahir = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $queryUpdate = "UPDATE tb_mhs SET 
                    nama='$nama',
                    jk='$jk',
                    tgl_lahir='$tgl_lahir',
                    jurusan='$jurusan',
                    alamat='$alamat'
                    WHERE nim='$id'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='mahasiswa.php';</script>";
        exit;
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
    }
}
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Update Data Mahasiswa</h1>
            <form action="" method="post" id="myForm" enctype="multipart/form-data">
                <div class="row py-3">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($data['nim']); ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label><br>
                            <input type="radio" name="jk" value="L" <?= ($data['jk'] == 'L') ? 'checked' : ''; ?>> Laki-laki <br>
                            <input type="radio" name="jk" value="P" <?= ($data['jk'] == 'P') ? 'checked' : ''; ?>> Perempuan
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= htmlspecialchars($data['tgl_lahir']); ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control">
                                <option value="Teknik Informatika" <?= ($data['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                                <option value="Teknik Elektro" <?= ($data['jurusan'] == 'Teknik Elektro') ? 'selected' : ''; ?>>Teknik Elektro</option>
                                <option value="Sistem Informasi" <?= ($data['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                <option value="Ilmu Komputer" <?= ($data['jurusan'] == 'Ilmu Komputer') ? 'selected' : ''; ?>>Ilmu Komputer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="8" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                        </div>
                    </div>
                    <footer class="container-fluid">
                        <button type="submit" class="btn btn-info btn-sm">Ubah Data</button>
                        <a href="mahasiswa.php" class="btn btn-warning btn-sm">Batal</a>
                    </footer>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'partial/footer.php'; ?>
