<?php
include_once("./connection.php");

if (isset($_POST["submit"])) {
    $id_pegawai   = $_POST["id_pegawai"];
    $nama_pegawai = $_POST["nama_pegawai"];

    $pegawai_check = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai' AND nama_pegawai='$nama_pegawai'");
    $data_pegawai_check = mysqli_fetch_array($pegawai_check);

    if ($id_pegawai != $data_pegawai_check["id_pegawai"] or $nama_pegawai != $data_pegawai_check["nama_pegawai"]) {
        echo "<script>alert('ID Pegawai atau Nama Pegawai yg Anda masukkan salah!');</script>";
        header("Location: login.php");
    } else {
        header("Location: index.html");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../style/css/login.css">
</head>

<body>

    <!--FORM LOGIN-->
    <form action="login.php" method="POST">
        <div>
            <label for="a">ID Pegawai</label><br>
            <input type="text" id="a" name="id_pegawai" placeholder="id pegawai" autocomplete="off" required>
        </div>
        <div>
            <label for="b">Nama Pegawai</label><br>
            <input type="text" id="b" name="nama_pegawai" placeholder="nama pegawai" autocomplete="off" required>
        </div>
        <!--LOGIN BUTTON-->
        <input type="submit" name="submit" value="Login" class="login-button">
    </form>

    <p>Masukkan ID Pegawai serta Nama Pegawai yg sesuai!</p>

</body>

</html>