<?php
		include "config.php";
		$tanggal = date('Y-m-d');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=Data_Siswa.csv');
		$output = fopen("php://output", "w");
		fputcsv($output, array('ID','Email','Nama','Password','Angkatan','Kelas','No HP'));
		$query = "SELECT id,email,nama,password,tingkat,kelas,no_hp FROM akun where level='siswa' order by id asc";
		$result = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($result)){
			fputcsv($output, $row);
		}
		fclose($output);
?>
