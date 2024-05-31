DROP TABLE kategori;
CREATE TABLE kategori (
	id_kategori		VARCHAR(3) 	NOT NULL,
    nama_kategori 	VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_kategori)
);
DESCRIBE kategori;

INSERT INTO kategori (id_kategori, nama_kategori)
	VALUES	("ARB", "Kopi Arabika"),
			("LBK", "Kopi Liberika"),
            ("LWK", "Kopi Luwak"),
            ("RBT", "Kopi Robusta");

SELECT * FROM kategori;