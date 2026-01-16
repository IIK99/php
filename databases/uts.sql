CREATE DATABASE pinjam_073;
USE pinjam_073;

CREATE TABLE mobil_073 (
    kd_mobil INT(10),
    nopol VARCHAR(10),
    nama VARCHAR(10),
    warna VARCHAR(10),
    merk VARCHAR(20),
    jenis ENUM('matic','manual') DEFAULT 'matic',
    bahan_bakar VARCHAR(10) DEFAULT 'bensin',
    kondisi VARCHAR(10) DEFAULT 'bersih',
    harga INT(20)
);

DESC mobil_073;

INSERT INTO mobil_073 (kd_mobil, nopol, nama, warna, merk, jenis, kondisi, harga)
VALUES
(202310, 'B9050PT', 'Terios', 'Hitam', 'Daihatsu', DEFAULT, DEFAULT, 2000000),
(202315, 'B3456JH', 'Ayla', 'Merah', 'Daihatsu', DEFAULT, DEFAULT, 800000),
(202321, 'B1245XY', 'Xenia', 'Hitam', 'Daihatsu', DEFAULT, DEFAULT, 1500000),
(202322, 'B8907AO', 'Avanza', 'Putih', 'Toyota', 'manual', DEFAULT, 1000000),
(202325, 'A7867BE', 'Ayla', 'Putih', 'Daihatsu', DEFAULT, 'kotor', 2000000);
    
SELECT * FROM mobil_073;

SELECT nopol, nama, warna, merk, harga FROM mobil_073
GROUP BY harga > 1000000;
-- yang benar pakai where bukan group by

SELECT nopol AS NomorPolisi, harga AS BiayaSewa FROM mobil_073;
ALTER TABLE mobil_073 CHANGE nopol NoPolisi VARCHAR(15);
ALTER TABLE mobil_073 CHANGE harga HargaSewa INT(25);

DELETE FROM mobil_073 WHERE bahan_bakar;
-- yang benar ALTER TABLE mobil_073 DROP COLUMN bahan_bakar;

UPDATE mobil_073
SET kondisi = 'bersih', jenis = 'manual'
WHERE kd_mobil = '202325';

SELECT * FROM mobil_073 WHERE warna = 'Putih' AND jenis = 'matic';

SELECT * FROM mobil_073 ORDER BY HargaSewa ASC;
DELETE FROM mobil_073 WHERE merk ='Ayla';
-- yang benar DELETE FROM mobil_073 WHERE nama ='Ayla';
SELECT * FROM mobil_073 ORDER BY kd_mobil ASC;