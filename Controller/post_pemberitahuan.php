<?php
include 'config.php';
	$konten = $_POST['konten'];
    $tanggal = date('Y-m-d');
	$sbh = mysqli_query($connection, "INSERT INTO pemberitahuan(konten)VALUES('$konten')");
	header("location:../Admin/Buat Pemberitahuan/");
?>