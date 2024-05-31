<?php
include_once("../connection.php");

$id_kopi_fromURL = $_GET['id_kopi'];

mysqli_query($mysqli, "UPDATE kopi SET jumlah_kopi = jumlah_kopi + 1 WHERE id_kopi = '$id_kopi_fromURL'");

header("Location: kopi.php");
