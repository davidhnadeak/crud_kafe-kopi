<?php
include_once("../connection.php");

$transaksi = mysqli_query($mysqli, "SELECT * FROM transaksi");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="../../style/css/transaksi.css">
</head>

<body>

    <!--BACK BUTTON-->
    <a href="../index.html" class="back-button">
        Halaman Utama
    </a>

    <!--HEADING TRANSAKSI-->
    <h1>Transaksi</h1>

    <!--TABLE TRANSAKSI-->
    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Kopi</th>
                <th>Banyak Kopi</th>
                <th>Total Harga</th>
                <th>Uang Bayar</th>
                <th>Uang Kembali</th>
                <th>Tanggal Transaksi</th>
                <th>ID Pegawai</th>
                <th>Atas Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data_transaksi = mysqli_fetch_array($transaksi)) {
                echo "<tr>";
                echo "<td>" .         $data_transaksi["id_transaksi"]      . "</td>";
                echo "<td>" .         $data_transaksi["id_kopi"]           . "</td>";
                echo "<td>" .         $data_transaksi["banyak_kopi"]       . "</td>";
                echo "<td>" . "Rp." . $data_transaksi["total_harga"]       . "</td>";
                echo "<td>" . "Rp." . $data_transaksi["uang_bayar"]        . "</td>";
                echo "<td>" . "Rp." . $data_transaksi["uang_kembali"]      . "</td>";
                echo "<td>" .         $data_transaksi["tanggal_transaksi"] . "</td>";
                echo "<td>" .         $data_transaksi["id_pegawai"]        . "</td>";
                echo "<td>" .         $data_transaksi["atas_nama"]         . "</td>";
                //DELETE BUTTON
                echo "<td class='delete-column'><a href='hapus_transaksi.php?id_transaksi=$data_transaksi[id_transaksi]' class='delete-button'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!--INSERT BUTTON-->
    <a href="tambah_transaksi.php" class="insert-button">
        Tambah <br>
        Transaksi
    </a>

</body>

</html>