<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h3>Hitung Harga Setelah Diskon</h3>
    
    <?php
    $diskon = [
        'elektronik' => 0.10,
        'pakaian' => 0.15,
        'buku' => 0.05,
    ]
    ?>
    <form method="post">
        <label for="">Pilih kategori barang:</label><br>
        <select name="kategori">
            <?php
            foreach ($diskon as $kategori => $persentase) {
                echo "<option value='$kategori'>$kategori - " . ($persentase * 100) . "% diskon</option>";
            }
            ?>
        </select><br><br>

        <label for="">Masukkan harga asli barang:</label><br>
        <input type="number" name="harga" min="1" value="1"><br><br>

        <input type="submit" name="hitung" value="Hitung Harga Setelah Diskon"><br><br>

        <?php
        if (isset($_POST['hitung'])) {
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];

            $hargaSetelahDiskon = $harga - ($harga * $diskon[$kategori]);

            echo "Harga setelah diskon: Rp " . number_format($hargaSetelahDiskon, 2);
        }
        ?>
 </body>
 </html>