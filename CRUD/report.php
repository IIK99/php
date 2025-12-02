<?php
require_once 'vendor/autoload.php';

$pdf = new TCPDF();
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Ikmal');
$pdf->setTitle('Laporan Data Mahasiswa');
$pdf->setHeaderData('', 0, 'Laporan Data Mahasiswa', 'Universitas Pamulang');

$pdf->setMargins(15, 27, 15);
$pdf->setHeaderMargin(10);
$pdf->setFooterMargin(10);

$pdf->AddPage();

include 'koneksi.php';
$query = "SELECT * FROM tb_mhs";
$result = mysqli_query($koneksi, $query);
$html = '<h2 style="text-align: center; width: 100%;">Data Mahasiswa</h2>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th align="center">No</th>
                    <th align="center">NIM</th>
                    <th align="center">Nama</th>
                    <th align="center">Jenis Kelamin</th>
                    <th align="center">Tanggal Lahir</th>
                    <th align="center">Jurusan</th>
                    <th align="center">Alamat</th>
                    <th align="center">Foto</th>
                </tr>
            </thead>
            <tbody>';
$no = 1;
while ($data = mysqli_fetch_array($result)) {
    $foto = '';
    if ($data['foto'] != '' && file_exists(__DIR__ . '/uploads/' . $data['foto'])) {
        $foto = '<img src="' . __DIR__ . '/uploads/' . $data['foto'] . '" width="50px" />';
    } else {
        $foto = '<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flookaside.fbsbx.com%2Flookaside%2Fcrawler%2Fmedia%2F%3Fmedia_id%3D100090620670005&f=1&nofb=1&ipt=64b7f6ae457b2a3518a33e8c4edddd46ec7350fcd7683482493327d5bf5b21c8" width="50px" />';
    }

    $html .= '<tr>
                <td align="center">' . $no++ . '</td>
                <td >' . $data['nim'] . '</td>
                <td >' . $data['nama'] . '</td>
                <td >' . $data['jk'] . '</td>
                <td >' . $data['tgl_lahir'] . '</td>
                <td >' . $data['jurusan'] . '</td>
                <td >' . $data['alamat'] . '</td>
                <td align="center">' . $foto . '</td>
              </tr>';
}
$html .= '</tbody></table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_data_mahasiswa.pdf', 'I'); //  I = Inline display in browser, D = Download file
?>