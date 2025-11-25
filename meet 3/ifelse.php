<?php

echo "Latihan percabangan if else <br><br>";

$nilai = 56;
echo "<u>Nilai yang anda peroleh = $nilai <br></u> <br>";

if ($nilai >= 90) {
    echo "Nilai A";
} elseif ($nilai >= 80) {
    echo "Nilai B";
} elseif ($nilai >= 70) {
    echo "Nilai C";
} elseif ($nilai >= 60) {
    echo "Nilai D";
} else {
    echo "Nilai E";
}

echo "<br><br>";
echo "Latihan perulangan for <br><br>";

for ($i = 1; $i <= 10; $i++) {
    echo "Nilai ke-$i <br>";
}

echo "<br><br>";
echo "Latihan perulangan while <br><br>";
$i = 1;
while ($i <= 10) {
    echo "Nilai ke-$i <br>";
    $i++;
}

echo "<br><br>";
echo "Latihan perulangan do while <br><br>";
$i = 1;
do {
    echo "Nilai ke-$i <br>";
    $i++;
} while ($i <= 10);

?>