<?php
include_once("../connection.php");

$kopi = mysqli_query($mysqli, "SELECT * FROM kopi");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kopi</title>
    <link rel="stylesheet" href="../../style/css/kopi.css">
</head>

<body>

    <!--BACK BUTTON-->
    <a href="../index.html" class="back-button">
        Halaman Utama
    </a>

    <!--HEADING KOPI-->
    <h1>Kopi</h1>

    <!--TABLE KOPI-->
    <table>
        <thead>
            <tr>
                <th>ID Kopi</th>
                <th>Nama Kopi</th>
                <th>Kategori Kopi</th>
                <th>Harga Kopi</th>
                <th>Jumlah Kopi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data_kopi = mysqli_fetch_array($kopi)) {
                echo "<tr>";
                echo "<td>" .         $data_kopi["id_kopi"]       . "</td>";
                echo "<td>" .         $data_kopi["nama_kopi"]     . "</td>";
                echo "<td>" .         $data_kopi["kategori_kopi"] . "</td>";
                echo "<td>" . "Rp." . $data_kopi["harga_kopi"]    . "</td>";
                echo "<td>" .         $data_kopi["jumlah_kopi"]   . "</td>";
                //UPDATE BUTTON
                echo "<td class='update-column'><a href='edit_kopi.php?id_kopi=$data_kopi[id_kopi]' class='update-button'>Tambah (+1)</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>