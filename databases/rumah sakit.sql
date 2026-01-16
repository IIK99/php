CREATE DATABASE rumah_sakit;
USE rumah_sakit;

CREATE TABLE pasien (id_pasien VARCHAR(5), nama CHAR(20), alamat CHAR(20),
		no_antrian VARCHAR(5), tgl_masuk DATE, PRIMARY KEY(id_pasien));
		
INSERT INTO pasien (id_pasien, nama, alamat, no_antrian, tgl_masuk) VALUES
	('A1', 'Yahya', 'Pondok Cabe', 'A11', '2014-05-21'),
	('A2', 'Yanto', 'Cinere', 'A12', '2014-05-23'),
	('A3', 'Yana', 'Cirendeu', 'A13', '2014-05-24');
	
SET @jmlpenambahan=0;
CREATE TRIGGER trigger1 BEFORE INSERT ON pasien FOR EACH ROW SET
@jmlpenambahan=@jmlpenambahan+1;

INSERT INTO pasien (id_pasien, nama, alamat, no_antrian, tgl_masuk) VALUES
	('A4', 'Yani', 'Cilandak', 'A14', '2014-05-24'),
	('A5', 'Yuli', 'Pondok Pinang', 'A15', '2014-05-25'),
	('A6', 'Yopi', 'Cirendeu', 'A15', '2014-05-25');
	
SELECT @jmlpenambahan;

