<?php
include 'partial/header.php';
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";

    $query = "INSERT INTO tb_mhs (nim, nama, jk, tgl_lahir, jurusan, alamat, foto) 
              VALUES ('$nim', '$nama', '$jk', '$tgl_lahir', '$jurusan', '$alamat', '$foto')";

    if (mysqli_query($koneksi, $query)) {
        move_uploaded_file($tmp, $folder . $foto);
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='mahasiswa.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan'); window.location.href='tambah.php';</script>";
    }
}
?>

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Tambah Data Mahasiswa</h1>
                    <form action="" method="post" id="myForm" enctype="multipart/form-data">
                        <div class="row py-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label><br>
                                    <input type="radio" id="jk" name="jk" value="L" required> Laki-laki <br>
                                    <input type="radio" id="jk" name="jk" value="P"> Perempuan
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-control">
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                        <option value="Teknik Elektro">Teknik Elektro</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                        <option value="Ilmu Komputer">Ilmu Komputer</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" cols="20" rows="4" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                    <img id="preview" src="#" alt="Preview Gambar" style="display:none;" width="100px" />
                            </div>
                            <footer class="container-fluid">
                                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
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
                    const preview = document.getElementById('preview');
                    preview.src = URL.createObjectURL(file);
                    preview.style.display = 'block';
                }
            };
        </script>
<?php include 'partial/footer.php'; ?>