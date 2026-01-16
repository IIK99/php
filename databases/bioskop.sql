CREATE DATABASE bioskop;
USE bioskop;

CREATE TABLE jadwal_film (id_film VARCHAR(15) PRIMARY KEY, judul CHAR(20), waktu DATETIME); 

DESC jadwal_film;

INSERT INTO jadwal_film (id_film, judul, waktu) VALUES
	('D11', 'In Fear', '2024-03-07 18:30:00'),
	('D12', 'Haunt', '2024-03-07 19:00:00'),
	('D13', 'Bad Word', '2024-03-07 19:30:00'),
	('D14', 'Divergent', '2024-03-07 20:30:00'),
	('D15', 'Enemy', '2024-03-07 20:30:00');
	
SELECT * FROM jadwal_film;
	
CREATE TABLE studio (code_studio VARCHAR(15) PRIMARY KEY, namaStudio CHAR(20), id_film VARCHAR(10),
	judul CHAR(20));
	
INSERT INTO studio (code_studio, namaStudio, id_film, judul) VALUES
	('STD4', 'Studio 4', 'E15', 'Enemy'),
	('STD3', 'Studio 3', 'D11', 'In Fear'),
	('STD2', 'Studio 2', 'C13', 'Bad word'),
	('STD5', 'Studio 5', 'A14', 'Divergent'),
	('STD1', 'Studio 1', 'H12', 'Haunt');

SELECT * FROM studio;
	
CREATE VIEW tblview AS SELECT jadwal_film.judul,jadwal_film.waktu,namaStudio
FROM jadwal_film,studio WHERE jadwal_film.id_film=studio.id_film;

SELECT * FROM tblview;