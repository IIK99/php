CREATE DATABASE Toko_073;
USE `Toko_073`;

CREATE TABLE Barang_073 (id_barang VARCHAR(10) PRIMARY KEY, nama_barang VARCHAR(50), kategori VARCHAR(30), stock INT,
harga INT, supplier VARCHAR(50), garansi VARCHAR(10));
DESC Barang_073;

INSERT INTO barang_073 (id_barang, nama_barang, kategori, stock, harga, supplier, garansi) VALUES
('BRG001', 'Laptop ASUS ROG', 'Laptop', 15, 20000000, 'PT. Global Tech', 'Ya'),
('BRG002', 'Laptop Lenovo', 'Laptop', 8, 12000000, 'PT. Citra Media', 'Tidak'),
('BRG003', 'Headset JBL', 'Audio', 25, 700000, 'PT. Indo Audio', 'Ya'),
('BRG004', 'TV Samsung 43\"', 'Elektronik', 5, 5500000, 'PT. Vision Jaya', 'Ya'),
('BRG005', 'Mouse Logitech', 'Aksesoris', 30, 250000, 'PT. Komindo', 'Tidak');

SELECT * FROM Barang_073;

SELECT id_barang, nama_barang, harga, stock FROM Barang_073 WHERE stock < 10 AND harga > 2000000;
SELECT nama_barang AS NamaProduck, 
harga AS HargaSatuan FROM Barang_073;

ALTER TABLE Barang_073 ADD COLUMN diskon INT(3);
DESC Barang_073;

UPDATE Barang_073 SET stock=25, harga=18000000, garansi='ya' WHERE id_barang='BRG001';
SELECT * FROM Barang_073;
SELECT * FROM Barang_073 WHERE kategori='Laptop' AND garansi='Ya';
SELECT * FROM Barang_073 ORDER BY harga DESC;

DELETE FROM Barang_073 WHERE nama_barang='Headset JBL';
SELECT * FROM Barang_073;
SELECT * FROM Barang_073 ORDER BY id_barang ASC;