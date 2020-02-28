<?php
	include 'config.php';
	$result = mysqli_query($connection, "SELECT * FROM pemberitahuan ORDER BY id desc");
	$data = mysqli_fetch_array($result);
?>