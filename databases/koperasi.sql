CREATE DATABASE koperasi;
USE koperasi;

CREATE TABLE member (Id_member VARCHAR(15),
	nama CHAR(20),
	alamat CHAR(20),
	PRIMARY KEY(Id_member));
	
DESC member;

INSERT INTO member (Id_member, nama, alamat) VALUES
	('1111', 'Anang', 'Cipondoh'),
	('1112', 'Budi', 'Ciledug'),
	('1113', 'Cici', 'Cinangka'),
	('1114', 'Darma', 'Cikupa'),
	('1115', 'Endang', 'Cipondoh');
	
CREATE TABLE pinjam (Nota VARCHAR(15),
	Id_member VARCHAR(20),
	Tanggal DATE,
	Jumlah CHAR(10), PRIMARY KEY(Nota));
DESC pinjam;	

INSERT INTO pinjam (Nota, Id_member, Tanggal, Jumlah) VALUES
	('A100', '1111', '2014-02-04', '500000'),
	('B100', '1112', '2014-02-06', '700000'),
	('C100', '1113', '2014-02-07', '400000'),
	('D100', '1114', '2014-02-09', '900000');
	
SELECT * FROM member INNER JOIN pinjam USING(Id_member);

SELECT a.Id_member, a.nama, a.alamat, b.Nota, b.Tanggal, b.Jumlah
FROM member a INNER JOIN pinjam b ON(a.Id_member=b.Id_member);

SELECT a.Id_member, a.nama, a.alamat, b.Nota, b.Tanggal, b.Jumlah
FROM member a LEFT OUTER JOIN pinjam b ON (a.Id_member=b.Id_member);

SELECT a.Id_member, a.nama, a.alamat, b.Nota, b.Tanggal, b.Jumlah
FROM member a LEFT OUTER JOIN pinjam b ON (a.Id_member=b.Id_member)
WHERE b.Nota IS NOT NULL;

SELECT a.Id_member, a.nama, a.alamat, b.Nota, b.Tanggal, b.Jumlah
FROM member a RIGHT OUTER JOIN pinjam b ON (a.Id_member=b.Id_member);

SELECT nama, Jumlah FROM member CROSS JOIN pinjam;

SELECT Id_member, nama, alamat FROM member UNION
SELECT Nota, Tanggal, Jumlah FROM pinjam;