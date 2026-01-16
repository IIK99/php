CREATE DATABASE Perpus_SI;

USE Perpus_SI;

CREATE TABLE penjualan (IdBuku INT NOT NULL AUTO_INCREMENT PRIMARY KEY, judul CHAR(50), Pengarang CHAR(100), Harga INT(15), stock INT (10));
DESC Penjualan;

INSERT INTO Penjualan (judul, Pengarang, Harga, stock) VALUES
('Membangun Database','Andi',60000,55),
('Algoritma','Suginanto',50000,45),
('Struktur Data','Ramadhani',70000,32),
('Pemograman Java','Suginanto',45000,12),
('Sistem Berkas','Andi',60000,83),
('Matematika Diskrit','Sinta Sari',50000,50);

SELECT * FROM penjualan;

SELECT DISTINCT Pengarang FROM Penjualan;
SELECT AVG (Harga) FROM penjualan WHERE Pengarang='Suginanto';
SELECT AVG (Harga) AS 'Rata-rata' FROM penjualan WHERE Pengarang='Suginanto';

SELECT COUNT(*) AS 'Buku Andi' FROM Penjualan WHERE Pengarang='Andi';

SELECT MIN(Harga) FROM Penjualan;
SELECT MAX(Harga) FROM Penjualan;

CREATE TABLE Pembelian (IdBuku INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Jenis_Buku CHAR(50), Penerbit CHAR(100), Pembelian INT(15));

INSERT INTO Pembelian (Jenis_Buku, Penerbit, Pembelian) VALUES
('Pemograman','Gramedia',20),
('Pemograman','Grasindo',23),
('Pemograman','Deepublish',36),
('Pemograman','Erlangga',23),
('Database','Gramedia',12),
('Database','Grasindo',43),
('Data Analyst','Gramedia',35),
('Jaringan Komputer','Deepublish',41),
('Jaringan Komputer','Grasindo',29);
DESC Pembelian;

SELECT Jenis_Buku, Penerbit, Pembelian, dense_rank() over(PARTITION BY Jenis_Buku ORDER BY Pembelian DESC) AS 'Dense Rank' FROM Pembelian;
SELECT Jenis_Buku, Penerbit, Pembelian, rank() over(PARTITION BY Jenis_Buku ORDER BY Pembelian DESC) AS 'Rank' FROM Pembelian;
SELECT Jenis_Buku, Penerbit, Pembelian, Percent_rank() over(PARTITION BY Jenis_Buku ORDER BY Pembelian DESC) AS 'Percent Rank' FROM Pembelian;

SELECT*FROM Penjualan WHERE Harga BETWEEN 50000 AND 60000;
SELECT*FROM Penjualan WHERE Pengarang IN ('Andi','Suginanto');
SELECT*FROM Penjualan WHERE Pengarang NOT IN ('Andi','Suginanto');

SELECT*FROM Penjualan ORDER BY Judul DESC;
SELECT*FROM Penjualan ORDER BY Judul ASC;
SELECT*FROM Penjualan GROUP BY Pengarang;
SELECT*FROM Penjualan GROUP BY Pengarang HAVING Stock<50;