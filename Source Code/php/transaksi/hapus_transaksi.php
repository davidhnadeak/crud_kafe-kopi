<?php
include_once('../connection.php');

$id_transaksi_fromURL = $_GET['id_transaksi'];

mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi_fromURL'");

header("Location: transaksi.php");
