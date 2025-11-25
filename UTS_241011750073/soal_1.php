 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h3>Cek Angka Ganjil atau Genap</h3>
    <form method="post">
        Masukkan Angka: <input type="number" name="angka" required>
        <input type="submit" name="cek" value="Cek">
    </form>

    <?php
    if (isset($_POST['cek'])) {
        $angka = $_POST['angka'];

        if ($angka % 2 == 0) {
            echo "<h3>Angka $angka adalah Genap</h3>";
        } else {
            echo "<h3>Angka $angka adalah Ganjil</h3>";
        }
    }
    ?>
 </body>
 </html>