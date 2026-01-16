CREATE DATABASE helpdesk;
USE helpdesk;

CREATE TABLE pencatatan_tamu073 (Id_Tamu INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Nama_Tamu VARCHAR(100) NOT NULL, Intansi VARCHAR(100), No_HP VARCHAR(15) NOT NULL, Tujuan_Kunjungan VARCHAR(200) NOT NULL, Waktu_Datang DATETIME NOT NULL, Status_Kunjungan VARCHAR(25));
DESC pencatatan_tamu073;

ALTER TABLE pencatatan_tamu073 ADD Email VARCHAR(100) AFTER No_HP;
DESC pencatatan_tamu073;

ALTER TABLE pencatatan_tamu073 MODIFY COLUMN Tujuan_Kunjungan VARCHAR(255);
DESC pencatatan_tamu073;

ALTER TABLE pencatatan_tamu073 DROP COLUMN intansi;
DESC pencatatan_tamu073;

INSERT INTO pencatatan_tamu073 (Id_Tamu, Nama_Tamu, No_HP, Tujuan_Kunjungan, Waktu_Datang, Status_Kunjungan)VALUES
('Ari Putra', '081234567890', 'ari@email.com', 'Bertemu Kepala Seksi','2025-10-15 09:15:00', 'Menunggu'),
('Dewi lestari', '08198765432', 'dewi@email.com', 'Mengantarkan Dokumen','2025-10-15 09:45:00', 'Menunggu'),
('Ikmal', '082112223333', 'ikmal@email.com', 'Kunjungan Industri','2025-10-15 10:30:00', 'Menunggu');
DESC pencatatan_tamu073;
SELECT * FROM pencatatan_tamu073;

UPDATE pencatatan_tamu073 SET Status_Kunjungan='Diterima' WHERE Nama_Tamu='Ari Putra';
SELECT * FROM pencatatan_tamu073;
SELECT * FROM pencatatan_tamu073 WHERE Status_Kunjungan='Menunggu';

DELETE FROM pencatatan_tamu073;
SELECT * FROM pencatatan_tamu073;


INSERT INTO pencatatan_tamu073
  (Nama_Tamu, No_HP, Email, Tujuan_Kunjungan, Waktu_Datang, Status_Kunjungan)
VALUES
  ('Ari Putra', '081234567890', 'ari@email.com', 'Bertemu Kepala Seksi', '2025-10-15 09:15:00', 'Menunggu'),
  ('Dewi Lestari', '08198765432',  'dewi@email.com', 'Mengantarkan Dokumen',   '2025-10-15 09:45:00', 'Menunggu'),
  ('Ikmal',      '082112223333',  'ikmal@email.com', 'Kunjungan Industri',      '2025-10-15 10:30:00', 'Menunggu');
SELECT * FROM pencatatan_tamu073;

UPDATE pencatatan_tamu073
SET Status_Kunjungan = 'Diterima'
WHERE Nama_Tamu = 'Ari Putra';
SELECT * FROM pencatatan_tamu073;

SELECT * FROM pencatatan_tamu073
WHERE Status_Kunjungan = 'Menunggu';