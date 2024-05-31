DROP TABLE kopi;
CREATE TABLE kopi (
	id_kopi			VARCHAR(3) 	NOT NULL,
    nama_kopi 		VARCHAR(30) NOT NULL,
    kategori_kopi 	VARCHAR(3) 	NOT NULL,
    harga_kopi 		INT 		NOT NULL,
    jumlah_kopi 	INT 		NOT NULL,
    PRIMARY KEY (id_kopi),
    FOREIGN KEY (kategori_kopi) REFERENCES kategori(id_kategori)
);
DESCRIBE kopi;

INSERT INTO Kopi (id_kopi, nama_kopi, kategori_kopi, harga_kopi, jumlah_kopi)
    VALUES  ("AGC", "Arabica Gayo Coffe", "ARB", 10000, 10),
            ("LBA", "Liberika Arjuno"   , "LBK", 20000, 20),
            ("LWC", "Luwak White Coffe" , "LWK", 30000, 30),
            ("RBG", "Robusta Gold"      , "RBT", 40000, 40);

SELECT * FROM kopi;