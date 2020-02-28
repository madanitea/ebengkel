<?php
		include "config.php";
		$tanggal = date('Y-m-d_h:i:s');
		header('Content-Type: text/csv; charset=utf-8');
		header("Content-Disposition: attachment; filename=Data_Barang_$tanggal.csv");
		$output = fopen("php://output", "w");
		fputcsv($output, array('ID','No Seri','Lokasi','Nama','Kondisi','Jenis','Jumlah','Keterangan','Status'));
		$query = "SELECT id_alat,no_seri_alat,lokasi_alat,nama_alat,kondisi_alat,jenis_alat,jumlah_alat,ket_alat,status_alat FROM alat order by id_alat asc";
		$result = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($result)){
			fputcsv($output, $row);
		}
		fclose($output);
?>
