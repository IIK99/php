<?php
include 'partials/header.php';

include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_mahasiswa where nim='$id'";

    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = "uploads/";

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        move_uploaded_file($tmp, $folder.$foto);

        $query = "UPDATE tb_mahasiswa set nama='$nama', jk='$jk',tgl_lahir='$tgl_lahir', jurusan='$jurusan', alamat='$alamat', foto='$foto' where nim='$id'";
    } else {
        $query = "UPDATE tb_mahasiswa set nama='$nama', jk='$jk',tgl_lahir='$tgl_lahir', jurusan='$jurusan', alamat='$alamat' where nim='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script> alert('Data Berhasil diupdate'); window.location.href='mahasiswa.php';</script>";
    } else {
        echo "<script> alert('Data gagal diupdate'); </script>";
    }
}

?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Ubah Data Mahasiswa</h1>
            <form action="" method="post" id="myForm" enctype="multipart/form-data">
                <div class="row py-3">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM" value="<?= $data['nim']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama']; ?>" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label><br>
                            <input type="radio" name="jk" id="jk" value="L" <?= $data['jk'] == 'L' ? 'checked' : ''; ?> required> Laki-laki
                            <input type="radio" name="jk" id="jk" value="P" <?= $data['jk'] == 'P' ? 'checked' : ''; ?> required> Perempuan
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Masukkan Nama" value="<?= $data['tgl_lahir']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control">
                                <option value="Teknik Informatika" <?= $data['jurusan'] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
                                <option value="Teknik Mesin" <?= $data['jurusan'] == 'Teknik Mesin' ? 'selected' : ''; ?>>Teknik Mesin</option>
                                <option value="Sistem Infomasi" <?= $data['jurusan'] == 'Sistem Infomasi' ? 'selected' : ''; ?>>Sistem Infomasi</option>
                                <option value="Teknik Industri" <?= $data['jurusan'] == 'Teknik Industri' ? 'selected' : ''; ?>>Teknik Industri</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="4"><?= $data['alamat']; ?></textarea>
                        </div>
                        <div class="form-group"></div>
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                            <br>
                            <?php
                            if ($data['foto'] == '') {
                                echo "<img src='assets/image/head.png' width='100px' id='previewImg'>";
                            } else {
                                echo "<img src='uploads/" . $data['foto'] . "' width='100px' id='previewImg'>";
                            }
                            ?>
                    </div>
                    <footer class="container-fluid">
                        <button type="submit" class="btn btn-info btn-sm">Ubah</button>
                        <a href="mahasiswa.php" class="btn btn-danger btn-sm">Kembali</a>
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
        }else{
            document.getElementById('previewImg').style.display = 'none';
        }
    };
</script>
<?php include 'partials/footer.php'; ?>