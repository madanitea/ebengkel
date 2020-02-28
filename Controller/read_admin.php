<?php
	include 'config.php';
	$result = mysqli_query($connection, "SELECT * FROM akun where level='admin'");
	$data = mysqli_fetch_array($result);
?>