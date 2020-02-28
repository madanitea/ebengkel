<?php
	include "config.php";
	$id_alat = $_POST['id_alat'];
	$kondisi = $_POST['kondisi'];
	$update = mysqli_query($connection, "UPDATE alat SET kondisi_alat='$kondisi' WHERE id_alat='$id_alat'");
?>