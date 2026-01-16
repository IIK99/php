CREATE DATABASE perpustakaan_073;
USE perpustakaan_073;

CREATE TABLE buku
(id_buku INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		judul VARCHAR(100),
		pengarang VARCHAR(100),
		thn_penerbit YEAR);
DESC buku;

CREATE TABLE anggota
(id_anggota INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(100),
alamat TEXT,
tgl_daftar DATE);
DESC anggota;

CREATE TABLE petugas
(id_petugas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nama_petugas VARCHAR(100),
shift VARCHAR(20));
DESC petugas;

CREATE TABLE peminjam
(id_pinjam INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
tgl_pinjam DATE,
tgl_kembali DATE,
id_buku INT,
CONSTRAINT fk_id_buku FOREIGN KEY (id_buku)
REFERENCES buku (id_buku) ON UPDATE CASCADE ON DELETE CASCADE,
id_anggota INT,
CONSTRAINT fk_id_anggota FOREIGN KEY (id_anggota)
REFERENCES anggota (id_anggota) ON UPDATE CASCADE ON DELETE CASCADE,
id_petugas INT,
CONSTRAINT fk_id_petugas FOREIGN KEY (id_petugas)
REFERENCES petugas (id_petugas) ON UPDATE CASCADE ON DELETE CASCADE);
DESC peminjam;

INSERT INTO anggota (nama, alamat, tgl_daftar) VALUES
('Rina', 'Bandung', '2023-01-12'),
('Yusuf', 'Jakarta', '2023-03-22');
SELECT * FROM anggota;

INSERT INTO buku (judul, pengarang, thn_penerbit) VALUES
('Dasar SQL', 'Andi', '2020'),
('Panduan Laravel', 'Budi', '2021'),
('Algoritma & Struktur', 'Citra', '2019');
SELECT * FROM buku;

INSERT INTO petugas (nama_petugas, shift) VALUES
('Dedi', 'Pagi'),
('Siska', 'Siang');
SELECT * FROM petugas;

INSERT INTO peminjam (id_buku, id_anggota, id_petugas, tgl_pinjam, tgl_kembali) VALUES
(1, 1, 2, '2023-05-01', '2023-05-07'),
(2, 2, 1, '2023-06-10', NULL);
SELECT * FROM peminjam;

SELECT a.nama AS nama_anggota, b.judul AS judul_buku, p.tgl_pinjam
FROM peminjam p
JOIN anggota a ON p.id_anggota = a.id_anggota
JOIN buku b ON p.id_buku = b.id_buku;

SELECT a.id_anggota, a.nama, p.id_pinjam
FROM anggota a
LEFT JOIN peminjam p ON a.id_anggota = p.id_anggota;

SELECT b.judul, a.nama AS nama_anggota, p.tgl_kembali
FROM peminjam p
JOIN buku b ON p.id_buku = b.id_buku
JOIN anggota a ON p.id_anggota = a.id_anggota
WHERE p.tgl_kembali IS NOT NULL;

SELECT pt.nama_petugas, COUNT(p.id_pinjam) AS jumlah_transaksi
FROM petugas pt
LEFT JOIN peminjam p ON pt.id_petugas = p.id_petugas
GROUP BY pt.id_petugas;

SELECT b.id_buku, b.judul
FROM buku b
LEFT JOIN peminjam p ON b.id_buku = p.id_buku
WHERE p.id_buku IS NULL;