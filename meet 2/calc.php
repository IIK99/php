<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <h3>Kalkulator sederhana</h3>

        <label for="">Masukkan angka 1</label>
        <input type="number" name="angka1" id="angka1"
        placeholder="Masukkan angka 1"><br>

        <label for="">Masukkan angka 2</label>
        <input type="number" name="angka2" id="angka2"
        placeholder="Masukkan angka 2"><br>

        <button type="submit">Submit</button>
    </form>

    <?php
        if(isset($_POST['angka1']) && isset($_POST['angka2'])){
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $penjumlahan = $angka1 + $angka2;

            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $pengurangan = $angka1 - $angka2;

            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $perkalian = $angka1 * $angka2;
        
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $pembagian = $angka1 / $angka2;

            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $modulus = $angka1 % $angka2;
            echo "<br>";


            echo "Hasil dari $angka1 + $angka2 adalah $penjumlahan";
            echo "<br>";
            echo "Hasil dari $angka1 - $angka2 adalah $pengurangan";
            echo "<br>";
            echo "Hasil dari $angka1 * $angka2 adalah $perkalian";
            echo "<br>";
            echo "Hasil dari $angka1 / $angka2 adalah $pembagian";
            echo "<br>";
            echo "Hasil dari $angka1 % $angka2 adalah $modulus";
            echo "<br>";
        }
    ?>
</body>
</html>