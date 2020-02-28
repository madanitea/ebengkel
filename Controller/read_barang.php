<?php
	include 'config.php';
	$result = mysqli_query($connection, "select * from alat where status_alat='Tersedia' AND(jumlah_alat IS NULL or jumlah_alat>0) order by id_alat DESC");
	
?>