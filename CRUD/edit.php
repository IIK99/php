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

    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = "uploads/";

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        move_uploaded_file($tmp, $folder.$foto);

        $query = "UPDATE tb_mhs set nama='$nama', jk='$jk',tgl_lahir='$tgl_lahir', jurusan='$jurusan', alamat='$alamat', foto='$foto' where nim='$id'";
    } else {
        $query = "UPDATE tb_mhs set nama='$nama', jk='$jk',tgl_lahir='$tgl_lahir', jurusan='$jurusan', alamat='$alamat' where nim='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
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
                            <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="4" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                        </div>
                        <div class="form-group"></div>
                            <label for="">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <br>
                            <?php
                            if ($data['foto'] != '') {
                                echo "<br><img src='uploads/" . htmlspecialchars($data['foto']) . "' width='100px' />";
                            } else {
                                echo "<br><img src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flookaside.fbsbx.com%2Flookaside%2Fcrawler%2Fmedia%2F%3Fmedia_id%3D100090620670005&f=1&nofb=1&ipt=64b7f6ae457b2a3518a33e8c4edddd46ec7350fcd7683482493327d5bf5b21c8' width='100px' />";
                            }
                            ?>
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
<script>
    document.getElementById('foto').onchange = function (evt) {
        const [file] = this.files;
        if (file) {
            const previewImg = document.getElementById('previewImg');
            previewImg.style.display = 'block';
            previewImg.src = URL.createObjectURL(file);
        } else {
            document.getElementById('previewImg').style.display = 'none';
        }
    };
</script>
<?php include 'partial/footer.php'; ?>
