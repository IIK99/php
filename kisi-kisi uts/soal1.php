<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h3>Menentukan generasi tahun kelahiran</h3>
    <form method="post">
        <label for="">Tahun lahir</label><br>
        <input type="number" name="tahun"><br>
        <input type="submit" name="check" value="check generasi"><br><br>
    </form>

    <?php
    if (isset($_POST['check'])) {
        $tahun = $_POST['tahun'];

        if ($tahun >= 1944 && $tahun <= 1964) {
            echo "<h4>Generasi Baby Boomers</h4>";
        } elseif ($tahun >= 1965 && $tahun <= 1980) {
            echo "<h4>Generasi X</h4>";
        } elseif ($tahun >= 1981 && $tahun <= 1996) {
            echo "<h4>Generasi Milenial</h4>";
        } elseif ($tahun >= 1997 && $tahun <= 2012) {
            echo "<h4>Generasi Z</h4>";
        } elseif ($tahun >= 2013) {
            echo "<h4>Generasi Alpha</h4>";
        } else {
            echo "<h4>Tahun lahir tidak valid</h4>";
        }
    }
    ?>
 </body>
 </html>