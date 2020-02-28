<?php
		include 'config.php';
	$result = mysqli_query($connection, "SELECT * FROM alat order by id_alat desc");
?>