CREATE DATABASE perpustakaan;
USE perpustakaan;
CREATE TABLE  buku (kdbuku INT NOT NULL PRIMARY KEY,
judul VARCHAR(100), tahun INT(4), pengarang VARCHAR(100),
penerbit VARCHAR(50));

SHOW TABLES;
DESC buku;

INSERT INTO buku VALUE (1, 'Basis Data', 2020, 'Abdul', 'Erlangga');
SELECT * FROM buku;
INSERT INTO buku VALUES
(2, 'Belajar Hacking', 2012, 'Yeni', 'Deeppublish'),
(3, 'Pemrograman Java', 2012, 'Ahmad', 'Gramedia');

INSERT INTO buku VALUES

INSERT INTO buku (kdbuku, judul) VALUES (6, 'HTML');

SELECT judul, pengarang, penerbit FROM buku;

ALTER TABLE buku ADD stock INT;
DESC buku;

ALTER TABLE buku CHANGE tahun tahunpenerbit INT(5);
ALTER TABLE buku MODIFY COLUMN pengarang VARCHAR(150);
DESC buku;

UPDATE buku SET stock=10;
SELECT * FROM buku;

UPDATE buku SET pengarang='Cahyo', penerbit='Suryo' WHERE pengarang IS NULL AND penerbit IS NULL;
SELECT * FROM buku ;

UPDATE buku SET stock=15 WHERE judul LIKE'%pemograman%';

-- 8
DROP DATABASE perpustakaan;
CREATE DATABASE perpustakaan;
USE perpustakaan;

CREATE TABLE penerbit (
	id_penerbit INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	penerbit VARCHAR(50),
	kota VARCHAR(20),
	alamat VARCHAR(150));
DESC penerbit;

CREATE TABLE pengarang (
	id_pengarang INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nama VARCHAR(100),
	gelar_depan VARCHAR(10),
	gelar_belakang VARCHAR(20),
	foto BLOB,
	instansi VARCHAR(30));
DESC pengarang;

CREATE TABLE buku (
	id_buku INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	judul VARCHAR(50),
	tahun INT(4),
	stok INT,
	id_penerbit INT,
	CONSTRAINT fk_id_penerbit FOREIGN KEY (id_penerbit)
	REFERENCES penerbit (id_penerbit) ON UPDATE CASCADE ON DELETE CASCADE);
DESC buku;

CREATE TABLE buku_pengarang (
	id VARCHAR(12) NOT NULL PRIMARY KEY,
	id_buku INT,
	id_pengarang INT, CONSTRAINT fk_id_buku FOREIGN KEY (id_buku)
	REFERENCES buku (id_buku) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_id_pengarang FOREIGN KEY (id_pengarang)
	REFERENCES pengarang (id_pengarang) ON UPDATE CASCADE ON DELETE CASCADE);
DESC buku_pengarang;

INSERT INTO penerbit (penerbit, kota, alamat) VALUES
	('Erlangga', 'Jakarta', 'Jl. M.H Thamrin No 28A'),
	('Andi', 'Yogyakarta', 'Jl. Kaliurang No 4A'),
	('Informatika', 'Bandung', 'Jl. A. Yani No 32B');
SELECT * FROM penerbit;

INSERT INTO pengarang (nama, gelar_depan, gelar_belakang, foto, instansi) VALUES
	('Edi Winarno', NULL, 'M.Eng', NULL, 'IBI Kesatuan'),
	('Ali Zaki', NULL, NULL, NULL, 'STMIK Jayakarta'),
	('Sri Hartati', 'Prof .Dra.', 'M.Sc., Pd.D', NULL, 'UGM'),
	('Agus Harjoko', 'Drs.', 'M.Sc., Pd.D', NULL, 'UGM'),
	('Sri Kusumadewi', 'Dr.', 'S.Si., M.T', NULL, 'UI');
SELECT * FROM pengarang;
	
INSERT INTO buku (judul, tahun, stok, id_penerbit) VALUES 
	('Aplikasi Kasir Sederhana', 2017, 66, 3),
	('Artificial Intellegence', 2016, 23, 2),
	('Genetic Algoritma', 2015, 34, 2),
	('Digital Image Processing and Recognition', 2017, 29, 1),
	('Fuzzy Inference System', 2017, 85, 1); 
SELECT * FROM buku;

INSERT INTO buku_pengarang (id, id_buku, id_pengarang) VALUES
	('BP_2_2', 2, 2),
	('BP_3_1', 3, 1),
	('BP_3_2', 3, 2),
	('BP_4_3', 4, 3),
	('BP_4_5', 4, 5),
	('BP_5_3', 5, 3),
	('BP_6_4', 5, 4),
	('BP_7_3', 4, 3),
	('BP_7_5', 4, 5);
SELECT * FROM buku_pengarang;



INSERT INTO buku (judul, tahun, stok, id_penerbit) VALUES ('Basis Data MySQL', 2014, 54, 1);
INSERT INTO buku VALUES (NULL,'Basis Data MySQL',2014,54,NULL);

UPDATE buku SET id_penerbit=2 WHERE id_buku=2;

SELECT id_buku, judul, penerbit, tahun, stok FROM buku, penerbit
WHERE buku.`id_penerbit`=penerbit.`id_penerbit`;

-- 9
SELECT judul, nama AS 'nama pengarang' FROM buku, pengarang, buku_pengarang, penerbit
WHERE buku.`id_buku`=buku_pengarang.`id_buku` AND pengarang.`id_pengarang`=buku_pengarang.`id_pengarang`;

SELECT judul, nama AS 'pengarang', penerbit FROM buku, buku_pengarang, penerbit
WHERE buku.`id_buku`=buku_pengarang.`id_buku` AND pengarang.`id_pengarang`=buku_pengarang.`id_pengarang`
AND buku.`id_penerbit`=penerbit.`id_penerbit`;

SELECT judul, nama AS 'pengarang', penerbit FROM buku
NATURAL JOIN penerbit NATURAL JOIN buku_pengarang NATURAL JOIN pengarang;

ALTER TABLE buku_pengarang CHANGE idbp id_bp VARCHAR(12) NOT NULL;

CREATE TABLE petugas(id_petugas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nama VARCHAR(100),
	no_hp CHAR(15),
	alamat VARCHAR(100));
DESC petugas;

CREATE TABLE kelola_pengarang (
	kd_kelola INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_petugas INT(11),
	id_pengarang INT(11),
	jnskelola VARCHAR(100), -- bisa pakai default 'insert'
	waktu TIME,
	tanggal DATE,
	CONSTRAINT fk_kelola_petugas FOREIGN KEY (id_petugas)
	REFERENCES petugas(id_petugas)
	ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_kelola_pengarang FOREIGN KEY (id_pengarang)
	REFERENCES pengarang(id_pengarang)
	ON UPDATE CASCADE ON DELETE CASCADE);
DESC kelola_pengarang;

CREATE TABLE kelola_BP (
	kd_kelola INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_bp VARCHAR(12),
	id_petugas INT(11),
	jnskelola VARCHAR(100), -- bisa pakai default 'insert'
	waktu TIME,
	tanggal DATE,
	CONSTRAINT fk_kelola_bp_bp FOREIGN KEY (id_bp)
	REFERENCES buku_pengarang(id_bp)
	ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_kelola_bp_petugas FOREIGN KEY (id_petugas)
	REFERENCES petugas(id_petugas)
	ON UPDATE CASCADE ON DELETE CASCADE);
DESC kelola_BP;

CREATE TABLE kelola_buku (
	kd_kelola INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_buku INT(11),
	id_petugas INT(11),
	jnskelola VARCHAR(100), -- bisa pakai default 'insert'
	waktu TIME,
	tanggal DATE,
	CONSTRAINT fk_kelola_buku_buku FOREIGN KEY (id_buku)
	REFERENCES buku(id_buku)
	ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_kelola_buku_petugas FOREIGN KEY (id_petugas)
	REFERENCES petugas(id_petugas)
	ON UPDATE CASCADE ON DELETE CASCADE);
DESC kelola_buku;

CREATE TABLE kelola_penerbit (
	kd_kelola INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_penerbit INT(11),
	id_petugas INT(11),
	jnskelola VARCHAR(100), -- bisa pakai default 'insert'
	waktu TIME,
	tanggal DATE,
	CONSTRAINT fk_kelola_penerbit_penerbit FOREIGN KEY (id_penerbit)
	REFERENCES penerbit(id_penerbit)
	ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_kelola_penerbit_petugas FOREIGN KEY (id_petugas)
	REFERENCES petugas(id_petugas)
	ON UPDATE CASCADE ON DELETE CASCADE);
DESC kelola_penerbit;

INSERT INTO petugas (nama, no_hp, alamat) VALUES
	('moeljoko', '082254661234', 'jl. abadi no 39b pelaihari'),
	('sari amalia', '082211224321', 'jl. perintis no 123a pelaihari');
SELECT * FROM petugas;

INSERT INTO kelola_pengarang (id_petugas, id_pengarang, jnskelola, waktu, tanggal) VALUES
	(1,1,'insert','08:20:05','2017-05-01'),
	(1,2,'insert','08:21:00','2017-05-01'),
	(1,3,'insert','08:21:45','2017-05-01'),
	(1,4,'insert','08:21:36','2017-05-01'),
	(1,5,'insert','08:21:06','2017-05-01');
SELECT * FROM kelola_pengarang;

SELECT kd_kelola, petugas.`nama` AS 'nama petugas',
pengarang.`nama` AS 'nama pengarang', jnskelola AS 'jenis pengelolaan',
tanggal, waktu FROM petugas NATURAL JOIN kelola_pengarang NATURAL JOIN pengarang;

SELECT kd_kelola, petugas.`nama` AS 'nama petugas',
pengarang.`nama` AS 'nama pengarang', jnskelola AS 'jenis pengelolaan',
tanggal, waktu FROM petugas, kelola_pengarang, pengarang
WHERE petugas.`id_petugas`=kelola_pengarang.`id_petugas`
AND pengarang.`id_pengarang`=kelola_pengarang.`id_pengarang`;

SELECT kelola_pengarang.*, no_hp FROM kelola_pengarang
LEFT JOIN petugas ON kelola_pengarang.`id_petugas`=petugas.`id_petugas`;

SELECT kelola_pengarang.*, no_hp FROM petugas
LEFT JOIN kelola_pengarang ON kelola_pengarang.`id_petugas`=petugas.`id_petugas`;

SELECT kelola_pengarang.*, no_hp FROM kelola_pengarang
RIGHT JOIN petugas ON kelola_pengarang.`id_petugas`-petugas.`id_petugas`;

SELECT kelola_pengarang.*, no_hp FROM petugas
RIGHT JOIN kelola_pengarang ON kelola_pengarang.`id_petugas`=petugas.`id_petugas`;

SELECT kd_kelola, petugas.`nama` AS 'nama petugas', pengarang.`nama` AS 'nama pengarang',
jnskelola AS 'jenis pengelolaan', tanggal, waktu FROM
(kelola_pengarang INNER JOIN pengarang ON kelola_pengarang.`id_pengarang`=pengarang.`id_pengarang`)
INNER JOIN petugas ON kelola_pengarang.`id_petugas`=petugas.`id_petugas`;

-- 10
