<!-- nama : iik muhamad ikmal
     nim  : 241011750073 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Menghitung luas dan keliling lingkaran</h3>
    <form method="post">
        <label for="lingkaran">Masukan nilai jari-jari</label><br>
        <input type="number" name="lingkaran" id="lingkaran" placeholder="Masukan nilai jari-jari" step="0.01" require><br><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['lingkaran'])) {
        $r = $_POST['lingkaran'];
        $luas = M_PI * pow($r, 2);
        $keliling = 2 * M_PI * $r;

        echo "<h4>Hasil perhitungan</h4>";
        echo "Jari-jari: $r<br>";
        echo "Luas lingkaran : " . number_format($luas, 2) . "<br>";
        echo "Keliling lingkaran : " . number_format($keliling, 2) . "<br>";
    }
    ?>
</body>
</html>