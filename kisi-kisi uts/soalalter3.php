<!-- array asosiatif menghitung makanan dg harga berapa dihitung!-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Hitung Total pesanan</h3>

    <?php
    $menu = [
        'Nasi Goreng' => 15000,
        'Nasi Uduk' => 12000,
        'Nasi Padang' => 20000,
        'Nasi Kuning' => 18000,
        'Nasi bebek' => 25000
    ];
    ?>
    <form method="post">
        <label for="">Pilihan Menu</label>
        <select name="pilihan">
            <?php foreach ($menu as $makanan => $harga) {
                echo "<option value='$makanan'>$makanan - Rp".number_format($harga,0,',','.'). "</option>";
            } ?>
        </select><br><br>

        Jumlah Pesanan : <input type="number" name="jumlah" required><br><br>
        <input type="submit" name="proses" value="Hitung Total">
    </form>
    <?php
    if (isset($_POST['proses'])) {
        $pilihan = $_POST['pilihan'];
        $jumlah = $_POST['jumlah'];
        $harga = $menu[$pilihan];
        $total = $harga * $jumlah;
        $diskon = ($total > 50000) ? 0.1 * $total : 0;
        $total_bayar = $total - $diskon;

        echo "<hr>";
        echo "Menu:$pilihan<br><br>";
        echo "Jumlah: $jumlah<br><br>";
        echo "Total harga sebelum diskon: $total<br><br>";
        echo "Diskon: $diskon<br><br>";
        echo "Total bayar: $total_bayar<br><br>";
    }


    ?>
</body>
</html>