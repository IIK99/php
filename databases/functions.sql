DELIMITER //
CREATE FUNCTION fungsi1(a SMALLINT)
RETURNS INT DETERMINISTIC
BEGIN RETURN (a+a);
END //
DELIMITER //
SELECT fungsi1(55);

-- Point C
DELIMITER //
CREATE FUNCTION fungsi2(kar CHAR(50)) RETURNS INT
DETERMINISTIC BEGIN RETURN LENGTH(kar);
END //
DELIMITER //
SELECT fungsi2('MySQL');

-- Point D
DELIMITER //
CREATE FUNCTION fungsi3(i SMALLINT)
RETURNS INT DETERMINISTIC
BEGIN RETURN(i+100);
END //
DELIMITER //
SELECT fungsi3(22);

-- Point E
SHOW CREATE FUNCTION fungsi1;
SHOW CREATE FUNCTION fungsi2;
SHOW CREATE FUNCTION fungsi3;

-- F
CREATE DATABASE sekolah;
USE sekolah;

CREATE TABLE siswa (
	nis VARCHAR(15) PRIMARY KEY,
	nama CHAR(20),
	angkatan VARCHAR(30));
	
INSERT INTO siswa VALUES
	('11234', 'ana', '2008/2009'),
	('11235', 'bayu', '2009/2010'),
	('11236', 'candra', '2010/2011'),
	('11237', 'dirga', '2011/2012'),
	('11238', 'endang', '2012/2013');
	
	
-- G
DELIMITER //
CREATE PROCEDURE jumlahmahasiswa3 (OUT jumlah INT)
BEGIN
  SELECT COUNT(*) INTO jumlah FROM siswa;
END //
DELIMITER ;

-- H
CALL jumlahsiswa3(@a);
SELECT @a;

-- I Tugas akhir - DB toko, tabel barang, procedure, dan pemanggilan
CREATE DATABASE toko;
USE toko;

-- J
CREATE TABLE barang (
    kode_barang VARCHAR(10) PRIMARY KEY,
    nama_barang VARCHAR(50),
    harga INT,
    stok INT
);

-- K
INSERT INTO barang VALUES
('BRG01', 'Pensil', 2000, 50),
('BRG02', 'Buku Tulis', 5000, 30),
('BRG03', 'Penghapus', 1500, 40),
('BRG04', 'Bolpoin', 3000, 25),
('BRG05', 'Spidol', 7000, 20);

-- L Procedure untuk menampilkan seluruh barang
DELIMITER //
CREATE PROCEDURE tampilBarang()
BEGIN
    SELECT * FROM barang;
END //
DELIMITER ;

-- M
CALL tampilBarang();

-- N Procedure untuk menambah barang baru
DELIMITER //
CREATE PROCEDURE tambahBarang(
    IN pkode VARCHAR(10),
    IN pnama VARCHAR(50),
    IN pharga INT,
    IN pstok INT
)
BEGIN
    INSERT INTO barang (kode_barang, nama_barang, harga, stok)
    VALUES (pkode, pnama, pharga, pstok);
END //
DELIMITER ;

-- O
CALL tambahBarang('BRG06', 'Map Plastik', 2500, 40);

-- P Procedure untuk menghitung total barang
DELIMITER //
CREATE PROCEDURE jumlahBarang(OUT total INT)
BEGIN
    SELECT COUNT(*) INTO total FROM barang;
END //
DELIMITER ;

-- Q
CALL jumlahBarang(@jml);
SELECT @jml;

-- R Procedure Update Stok Barang
DELIMITER //
CREATE PROCEDURE updateStok(
    IN pkode VARCHAR(10),
    IN pjml INT
)
BEGIN
    UPDATE barang SET stok = pjml WHERE kode_barang = pkode;
END //
DELIMITER ;

CALL updateStok('BRG02', 99);

-- S Procedure Hapus Barang
DELIMITER //
CREATE PROCEDURE hapusBarang(
    IN pkode VARCHAR(10)
)
BEGIN
    DELETE FROM barang WHERE kode_barang = pkode;
END //
DELIMITER ;

CALL hapusBarang('BRG05');
