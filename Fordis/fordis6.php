<!DOCTYPE html>
<html>
<head>
  <title>Forum diskusi 6</title>
</head>
<body>
  <h2>Latihan Operasi Array,<br>
  <h3><B>Nama : Iik Muhamad Ikmal</B>,<br>
  <u>NIM : 241011750073</u></h2></h3>
  
   <?php
  // Array awal
  $a = [1, 2, 3];
  $b = [4, 5, 6];

  echo "<h3>1. Menggabungkan dua array</h3>";
  echo "Array A: ";
  print_r($a);
  echo "<br>";
  echo "Array B: ";
  print_r($b);
  echo "<br>";
  $gabung = array_merge($a, $b);
  echo "Setelah digabung: ";
  print_r($gabung);
  echo "<br><br>";

  echo "<h3>2. Menghapus elemen terakhir</h3>";
  $data = [10, 20, 30];
  echo "Sebelum dihapus: ";
  print_r($data);
  echo "<br>";
  array_pop($data);
  echo "Sesudah dihapus: ";
  print_r($data);
  echo "<br><br>";

  echo "<h3>3. Mencari nilai maksimum</h3>";
  $nilai = [45, 67, 89, 32];
  echo "Array nilai: ";
  print_r($nilai);
  echo "<br>";
  echo "Nilai maksimum: " . max($nilai);
  echo "<br><br>";

  echo"<h2>Latihan Multi Dimensi Array Asosiatif</h2>";
  $siswa = [
      [
          "nama" => "Ikmal",
          "umur" => 17,
          "kota" => "Bandung"
      ],
      [
          "nama" => "Budi",
          "umur" => 16,
          "kota" => "Jakarta"
      ],
      [
          "nama" => "Siti",
          "umur" => 18,
          "kota" => "Surabaya"
      ]
  ];

  echo "<h3>Sebelum ditampilkan dalam tabel:</h3>";
  echo "<pre>";
  print_r($siswa);
  echo "</pre>";

  echo "<h3>Sesudah ditampilkan dalam tabel:</h3>";
  echo "<table border='1' cellpadding='5' cellspacing='0'>";
  echo "<tr><th>Nama</th><th>Umur</th><th>Kota</th></tr>";

  foreach ($siswa as $data) {
      echo "<tr>";
      echo "<td>" . $data["nama"] . "</td>";
      echo "<td>" . $data["umur"] . "</td>";
      echo "<td>" . $data["kota"] . "</td>";
      echo "</tr>";
  }

  echo "</table>";
  ?>

</body>
</html>