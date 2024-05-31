DROP TABLE transaksi;
CREATE TABLE transaksi (
	id_transaksi 		INT 		NOT NULL AUTO_INCREMENT,
    id_kopi				VARCHAR(3)	NOT NULL,
    banyak_kopi 		INT 		NOT NULL,
    total_harga 		INT 		NOT NULL,
    uang_bayar			INT 		NOT NULL,
    uang_kembali 		INT 		NOT NULL,
    tanggal_transaksi 	DATE	 	NOT NULL,
    id_pegawai			VARCHAR(3) NOT NULL,
    atas_nama			VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_transaksi),
    FOREIGN KEY (id_kopi) 		REFERENCES kopi(id_kopi),
    FOREIGN KEY (id_pegawai) 	REFERENCES pegawai(id_pegawai)
);
DESCRIBE transaksi;

INSERT INTO transaksi (id_kopi, banyak_kopi, total_harga, uang_bayar, uang_kembali, tanggal_transaksi, id_pegawai, atas_nama)
	VALUES	("AGC", 1, 10000 , 100000, 90000 , 20221101, "DAV", "Naruto"),
			("LBA", 2, 40000 , 200000, 160000, 20221102, "DRI", "Sasuke"),
            ("LWC", 3, 90000 , 300000, 210000, 20221103, "GIL", "Sakura"),
            ("RBG", 4, 160000, 400000, 240000, 20221104, "KHA", "Kakashi");

SELECT * FROM transaksi;