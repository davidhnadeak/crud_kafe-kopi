DROP TABLE pegawai;
CREATE TABLE pegawai (
	id_pegawai 		VARCHAR(3) 	NOT NULL,
    nama_pegawai 	VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_pegawai)
);
DESCRIBE pegawai;

INSERT INTO pegawai (id_pegawai, nama_pegawai)
    VALUES  ("DAV", "David"),
			("DRI", "Drinky"),
            ("GIL", "Gilang"),
            ("KHA", "Khalish");
    
SELECT * FROM pegawai;