<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <h3>Hitung Nilai Akhir Mahasiswa</h3>
    <form method="post">
        Presensi (%) : <input type="number" name="presensi" required><br><br>
        Tugas : <input type="number" name="tugas" required><br><br>
        UTS : <input type="number" name="uts" required><br><br>
        UAS : <input type="number" name="uas" required><br><br>
        <input type="submit" name="hitung" value="Hitung Nilai">
    </form>
    
    <?php
    if (isset($_POST['hitung'])) {
        $presensi = $_POST['presensi'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];

        $nilaiakhir = ($presensi * 0.1) + ($tugas * 0.2) + ($uts * 0.3) + ($uas * 0.4);

        if ($presensi < 50) {
            $grade = 'E';
            $status = "Tidak Lulus";
        } elseif ($presensi < 75) {
            $grade = 'D';
            $status = "Tidak Lulus";
        } else {
            if ($nilaiakhir >= 85) $grade = 'A';
            elseif ($nilaiakhir >= 70) $grade = 'B';
            elseif ($nilaiakhir >= 55) $grade = 'C';
            elseif ($nilaiakhir >= 40) $grade = 'D';
            else $grade = 'E';

            $status = ($nilaiakhir >= 60) ? 'Lulus' : 'Tidak Lulus';
        }
        echo "<hr>";
        echo "Nilai Akhir: " . number_format($nilaiakhir, 2) . "<br><br>";
        echo "Grade: $grade<br><br>";
        echo "Status: $status<br><br>";
    }
    ?>
</body>
</html>