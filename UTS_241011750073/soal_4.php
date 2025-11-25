<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Input nilai mahasiswa</h3>
    <form method="post">
        <?php
        $mata_kuliah = ["Pemograman web 2", "Basis data 2", "Jaringan komputer"];

        foreach ($mata_kuliah as $mk) {
            echo "<h4>$mk</h4>";
            echo "Presensi (0-100): <input type='number' name='presensi[]' min='0' max='100' required><br>";
            echo "Tugas (0-100): <input type='number' name='tugas[]' min='0' max='100' required><br>";
            echo "UTS (0-100): <input type='number' name'uts[]' min='0' max='100' required><br>";
            echo "UAS (0-100): <input type='number' name'uas[]' min='0' max='100' required><br>";
        }
        ?>
        <button type="submit" name="proses">Hitung nilai</button>
    </form>

    <hr>
    <?php
    if(isset($_POST['proses'])) {
        $presensi = $_POST['presensi'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];

        $total_nilai = 0;
        $jumlah_mk = count($mata_kuliah);

        for ($i , $jumlah_mk; $i++) {
            $nilai_akhir = ($presensi[$i] * 0.10) + ($tugas[$i] * 0.20) + ($uts[$i] * 0.20) + ($uas[$i] * 0.40);

            if ($presensi[$i] < 50) {
                $grade = "E";
            } elseif ($presensi[$i] < 75) {
                $grade = "D";
            } else {
                if ($nilai_akhir >= 85) $grade = "A";
                elseif ($nilai_akhir >= 75) $grade = "B";
                elseif ($nilai_akhir >= 60) $grade = "C";
                elseif ($nilai_akhir >= 50) $grade = "D";
                else $grade = "E";
            }

            $status = ($nilai_akhir >= 60) ? "Lulus" : "Tidak lulus";
            echo "<b>{$mata_kuliah[$i]}</b><br>";
            echo "Presensi: {$presensi[$i]}%<br>";
            echo "Tugas: {$tugas[$i]}<br>";
            echo "UTS: {$uts[$i]}<br>";
            echo "UAS: {$uas[$i]}<br>";
        
        $total_nilai += $nilai_akhir;
    }

    $rata = $total_nilai / $jumlah_mk;
    echo "<hr><b>Rata-rata nilai akhir</b> " . number_format($rata, 2);
    }
    ?>
</body>
</html>