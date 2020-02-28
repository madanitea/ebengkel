<?php
		include "config.php";
		$tanggal = date('Y-m-d');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=Template Data Barang.csv');
		$output = fopen("php://output", "w");
		fputcsv($output, array('No Seri','Nama Alat','Kondisi','Jenis','jumlah','Lokasi'));
		fclose($output);
?>
