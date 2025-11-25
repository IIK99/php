 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h3>Hitung total pesanan</h3>
    
    <?php
    $menu = [
        'Nasi Goreng' => 15000,
        'Mie Ayam' => 12000,
        'Sate' => 10000,
        'Ayam Goreng' => 8000,
        'Tempeh' => 5000,
    ]
    ?>
    <form method="post">
        <label for="">Pilih menu:</label><br>
        <select name="pesanan">
            <?php
            foreach ($menu as $item => $harga) {
                echo "<option value='$item'>$item - Rp $harga</option>";
            }
            ?>
        </select><br><br>

        <label for="">Jumlah pesanan:</label><br>
        <input type="number" name="jumlah" min="1" value="1"><br><br>

        <input type="submit" name="hitung" value="Hitung Total"><br><br>

        <?php
        if (isset($_POST['hitung'])) {
            $pesanan = $_POST['pesanan'];
            $jumlah = $_POST['jumlah'];
            $total = 0;

            for ($i = 0; $i < $jumlah; $i++) {
                $total += $menu[$pesanan];
            }

            echo "Total pesanan: $total";
        }
        ?>
 </body>
 </html>