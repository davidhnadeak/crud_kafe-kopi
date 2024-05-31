<?php
include_once("../connection.php");

$kopi    = mysqli_query($mysqli, "SELECT * FROM kopi");
$pegawai = mysqli_query($mysqli, "SELECT * FROM pegawai");

if (isset($_POST["submit"])) {
    $id_kopi           = $_POST["id_kopi"];
    $banyak_kopi       = $_POST["banyak_kopi"];
    $total_harga       = $_POST["total_harga"];
    $uang_bayar        = $_POST["uang_bayar"];
    $uang_kembali      = $_POST["uang_bayar"] - $_POST["total_harga"];
    $tanggal_transaksi = $_POST["tahun"] . $_POST["bulan"] . $_POST["hari"];
    $id_pegawai        = $_POST["id_pegawai"];
    $atas_nama         = $_POST["atas_nama"];

    $kopi_selectbyid = mysqli_query($mysqli, "SELECT * FROM kopi WHERE id_kopi='$id_kopi'");
    $harga_kopi      = mysqli_fetch_array($kopi_selectbyid);

    if ($uang_kembali < 0) {
        echo "<script>alert('Uang Bayar tidak mencukupi Total Harga!');</script>";
    } elseif ($total_harga != $harga_kopi["harga_kopi"] * $banyak_kopi) {
        echo "<script>alert('Terdapat kesalahan saat menghitung Total Harga!');</script>";
    } else {
        mysqli_query($mysqli, "INSERT INTO transaksi(id_kopi, banyak_kopi, uang_bayar, total_harga, uang_kembali, tanggal_transaksi, id_pegawai, atas_nama) VALUES('$id_kopi', $banyak_kopi, $uang_bayar, $total_harga, $uang_kembali, $tanggal_transaksi, '$id_pegawai', '$atas_nama')");
        mysqli_query($mysqli, "UPDATE kopi SET jumlah_kopi = jumlah_kopi - $banyak_kopi WHERE id_kopi = '$id_kopi'");
        header("Location: transaksi.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="../../style/css/tambah_transaksi.css">
</head>

<body>

    <!--BACK BUTTON-->
    <a href="transaksi.php" class="back-button">Back</a>

    <!--HEADING TAMBAH TRANSAKSI-->
    <h1>Tambah Transaksi</h1>

    <!--FORM TAMBAH TRANSAKSI-->
    <form action="tambah_transaksi.php" method="POST">
        <table>
            <!--INPUT ID KOPI-->
            <tr>
                <th>Kopi</th>
                <td>
                    <select name="id_kopi" required>
                        <?php
                        while ($data_kopi = mysqli_fetch_array($kopi)) {
                            echo "<option value='" . $data_kopi["id_kopi"] . "'>" . $data_kopi["nama_kopi"] . " | kategori: " . $data_kopi["kategori_kopi"] . " | harga: Rp." . $data_kopi["harga_kopi"] . " | sisa: " . $data_kopi["jumlah_kopi"] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <!--INPUT BANYAK KOPI-->
            <tr>
                <th>Banyak Kopi</th>
                <td><input type="number" name="banyak_kopi" min="1" required></td>
            </tr>

            <!--INPUT TOTAL HARGA-->
            <tr>
                <th>Total Harga</th>
                <td><input type="number" name="total_harga" min="1000" step="1000" required></td>
            </tr>

            <!--INPUT UANG BAYAR-->
            <tr>
                <th>Uang Bayar</th>
                <td><input type="number" name="uang_bayar" min="1000" step="1000" required></td>
            </tr>

            <!--INPUT TANGGAL TRANSAKSI-->
            <tr>
                <th>Tanggal Transaksi</th>
                <td>
                    <select name="hari" required>
                        <option value="">Hari</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select name="bulan" required>
                        <option value="">Bulan</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <input type="number" name="tahun" min="2022" maxlength="4" placeholder="Tahun" required>
                </td>
            </tr>

            <!--INPUT ID PEGAWAI-->
            <tr>
                <th>ID Pegawai</th>
                <td>
                    <select name="id_pegawai" required>
                        <?php
                        while ($data_pegawai = mysqli_fetch_array($pegawai)) {
                            echo "<option value='" . $data_pegawai["id_pegawai"] . "'>" . $data_pegawai["id_pegawai"] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <!--INPUT ATAS NAMA-->
            <tr>
                <th>Atas Nama</th>
                <td><input type="text" name="atas_nama" maxlength="30" required></td>
            </tr>

            <!--SUBMIT BUTTON-->
            <tr>
                <th></th>
                <td><input type="submit" name="submit" value="Tambah" class="submit-button"></td>
            </tr>
        </table>
    </form>

</body>

</html>