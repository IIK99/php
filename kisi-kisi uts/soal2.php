<!DOCTYPE html>
<html>
<head>
    <title>Penjumlahan & Pengurangan</title>
</head>
<body>
    <h2>Kalkulator Sederhana (PHP Function)</h2>
    <form method="post">
        Angka 1: <input type="number" name="angka1" step="any"><br><br>
        Angka 2: <input type="number" name="angka2" step="any"><br><br>
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>

    <hr>

    <?php
    function tambah($a, $b) {
        return $a + $b;
    }

    function kurang($a, $b) {
        return $a - $b;
    }

    if (isset($_POST['tambah']) || isset($_POST['kurang'])) {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];

        // Validasi input kosong
        if ($angka1 === "" || $angka2 === "") {
            echo "<p style='color:red;'>⚠️ Harap isi kedua angka terlebih dahulu!</p>";
        } else {
            // Pastikan input berupa angka
            if (!is_numeric($angka1) || !is_numeric($angka2)) {
                echo "<p style='color:red;'>⚠️ Input harus berupa angka!</p>";
            } else {
                // Jalankan operasi
                if (isset($_POST['tambah'])) {
                    $hasil = tambah($angka1, $angka2);
                    echo "<p>Hasil Penjumlahan: <b>$hasil</b></p>";
                } else {
                    $hasil = kurang($angka1, $angka2);
                    echo "<p>Hasil Pengurangan: <b>$hasil</b></p>";
                }
            }
        }
    }
    ?>
</body>
</html>