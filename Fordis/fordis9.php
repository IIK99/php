<?php
// soal no 4
date_default_timezone_set("Asia/Jakarta"); 

$tanggal = date("d-F-Y");
$waktu = date("h:i:s A");

echo "Sekarang tanggal $tanggal dan jam $waktu.";

echo "<br><br>";

// soal no 5
date_default_timezone_set("Asia/Jakarta");
$now = getdate();
$hour = $now['hours'];
$tanggal = $now['mday'] . "-" . $now['month'] . "-" . $now['year'];

if ($hour >= 0 && $hour <= 11) {
    $ucapan = "Selamat Pagi";
} elseif ($hour >= 12 && $hour <= 15) {
    $ucapan = "Selamat Siang";
} elseif ($hour >= 16 && $hour <= 18) {
    $ucapan = "Selamat Sore";
} else {
    $ucapan = "Selamat Malam";
}

echo "$ucapan, sekarang adalah tanggal $tanggal.";

echo "<br><br>";

// soal no 6
$nama = "adi efendi";
$jumlahKarakter = strlen($nama);
$hurufBesar = strtoupper($nama);
$formatNama = ucwords(strtolower($nama));

echo "Input: \"$nama\"<br>";
echo "- Jumlah karakter: $jumlahKarakter<br>";
echo "- Huruf besar: \"$hurufBesar\"<br>";
echo "- Format: \"$formatNama\"";
?>
