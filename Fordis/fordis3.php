<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Umur</title>
</head>
<body>
    <h2>Program Kategori Umur</h2>
    <form method="post" action="">
        Masukkan Usia: <input type="number" name="usia" required>
        <button type="submit">Cek</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usia = $_POST['usia'];
        $kategori = "";

        switch (true) {
            case ($usia >= 0 && $usia <= 12):
                $kategori = "Anak-anak";
                break;
            case ($usia >= 13 && $usia <= 17):
                $kategori = "Remaja";
                break;
            case ($usia >= 18 && $usia <= 59):
                $kategori = "Dewasa";
                break;
            case ($usia >= 60):
                $kategori = "Lansia";
                break;
            default:
                $kategori = "Usia tidak valid";
                break;
        }

        echo "<h3>Usia Anda: $usia tahun</h3>";
        echo "<h3>Kategori: $kategori</h3>";
    }
    ?>
</body>
</html>