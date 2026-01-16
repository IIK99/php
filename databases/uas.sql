DROP DATABASE uas_perpustakaan_073;
CREATE DATABASE uas_perpustakaan_073;
USE uas_perpustakaan_073;

CREATE TABLE petugas (
    idpetugas INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    no_hp CHAR(15),
    alamat VARCHAR(100)
);

CREATE TABLE penerbit (
    idpenerbit INT AUTO_INCREMENT PRIMARY KEY,
    penerbit VARCHAR(50),
    kota VARCHAR(20),
    alamat VARCHAR(150)
);

CREATE TABLE pengarang (
    idpengarang INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    gelar_depan VARCHAR(10),
    gelar_belakang VARCHAR(20),
    foto BLOB,
    instansi VARCHAR(30)
);

CREATE TABLE buku (
    idbuku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(50),
    tahun YEAR,
    stok INT,
    idpenerbit INT,
    FOREIGN KEY (idpenerbit) REFERENCES penerbit(idpenerbit)
);

CREATE TABLE buku_pengarang (
    idbp INT AUTO_INCREMENT PRIMARY KEY,
    idbuku INT,
    idpengarang INT,
    FOREIGN KEY (idbuku) REFERENCES buku(idbuku),
    FOREIGN KEY (idpengarang) REFERENCES pengarang(idpengarang)
);

CREATE TABLE kelola_buku (
    kdkelola INT AUTO_INCREMENT PRIMARY KEY,
    idbuku INT,
    idpetugas INT,
    jnskelola VARCHAR(100),
    waktu TIME,
    tanggal DATE,
    FOREIGN KEY (idbuku) REFERENCES buku(idbuku),
    FOREIGN KEY (idpetugas) REFERENCES petugas(idpetugas)
);

CREATE TABLE kelola_pengarang (
    kdkelola INT AUTO_INCREMENT PRIMARY KEY,
    idpetugas INT,
    idpengarang INT,
    jnskelola VARCHAR(100),
    waktu TIME,
    tanggal DATE,
    FOREIGN KEY (idpetugas) REFERENCES petugas(idpetugas),
    FOREIGN KEY (idpengarang) REFERENCES pengarang(idpengarang)
);

CREATE TABLE kelola_penerbit (
    kdkelola INT AUTO_INCREMENT PRIMARY KEY,
    idpenerbit INT,
    idpetugas INT,
    jnskelola VARCHAR(100),
    waktu TIME,
    tanggal DATE,
    FOREIGN KEY (idpenerbit) REFERENCES penerbit(idpenerbit),
    FOREIGN KEY (idpetugas) REFERENCES petugas(idpetugas)
    );
    
    CREATE TABLE kelola_bp (
    kdkelola INT AUTO_INCREMENT PRIMARY KEY,
    idbp INT,
    idpetugas INT,
    jnskelola VARCHAR(100),
    waktu TIME,
    tanggal DATE,
    FOREIGN KEY (idbp) REFERENCES buku_pengarang(idbp),
    FOREIGN KEY (idpetugas) REFERENCES petugas(idpetugas)
);

-- trigger insert
DELIMITER //

CREATE TRIGGER trg_insert_penerbit
AFTER INSERT ON penerbit
FOR EACH ROW
BEGIN
    INSERT INTO kelola_penerbit
    (idpenerbit, idpetugas, jnskelola, waktu, tanggal)
    VALUES
    (NEW.idpenerbit, 1, 'INSERT', CURTIME(), CURDATE());
END;
//

DELIMITER ;

-- trigger update
DELIMITER //

CREATE TRIGGER trg_update_penerbit
AFTER UPDATE ON penerbit
FOR EACH ROW
BEGIN
    INSERT INTO kelola_penerbit
    (idpenerbit, idpetugas, jnskelola, waktu, tanggal)
    VALUES
    (NEW.idpenerbit, 1, 'UPDATE', CURTIME(), CURDATE());
END;
//

DELIMITER ;

-- insert data
INSERT INTO petugas (nama, no_hp, alamat)
VALUES ('Admin Perpustakaan', '081234567890', 'Ruang Admin');

INSERT INTO penerbit (penerbit, kota, alamat) VALUES
('Gramedia', 'Jakarta', 'Jl. Palmerah Selatan'),
('Erlangga', 'Jakarta', 'Jl. H. Baping Raya'),
('Andi Offset', 'Yogyakarta', 'Jl. Beo'),
('Informatika', 'Bandung', 'Jl. Buah Batu'),
('Deepublish', 'Yogyakarta', 'Jl. Rajawali');

-- joint
SELECT 
    pg.nama AS nama_pengarang,
    kp.tanggal AS tgl_insert_pengarang,
    b.judul,
    p.penerbit AS nama_penerbit,
    kpn.tanggal AS tgl_insert_penerbit,
    pt.nama AS nama_petugas
FROM buku b
JOIN buku_pengarang bp ON b.idbuku = bp.idbuku
JOIN pengarang pg ON bp.idpengarang = pg.idpengarang
JOIN kelola_pengarang kp ON pg.idpengarang = kp.idpengarang
JOIN penerbit p ON b.idpenerbit = p.idpenerbit
JOIN kelola_penerbit kpn ON p.idpenerbit = kpn.idpenerbit
JOIN petugas pt ON kpn.idpetugas = pt.idpetugas;

-- view
CREATE VIEW info_buku AS
SELECT 
    b.judul,
    pg.nama AS nama_pengarang,
    p.penerbit AS nama_penerbit,
    pt.nama AS nama_petugas,
    kpn.tanggal
FROM buku b
JOIN buku_pengarang bp ON b.idbuku = bp.idbuku
JOIN pengarang pg ON bp.idpengarang = pg.idpengarang
JOIN penerbit p ON b.idpenerbit = p.idpenerbit
JOIN kelola_penerbit kpn ON p.idpenerbit = kpn.idpenerbit
JOIN petugas pt ON kpn.idpetugas = pt.idpetugas;

SELECT * FROM info_buku;