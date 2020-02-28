<?php
	include 'config.php';
	$id_keranjang = $_GET['id_keranjang'];
	$cek=mysqli_query($connection, "SELECT keranjang.jumlah_pinjam,alat.jumlah_alat,keranjang.id,alat.id_alat,alat.nama_alat,keranjang.status_keranjang,alat.kondisi_alat,alat.jenis_alat FROM keranjang INNER JOIN alat ON keranjang.alat_id_alat = alat.id_alat WHERE id='$id_keranjang' AND status_keranjang='Dikeranjangkan'");
	$data = mysqli_fetch_array($cek);
	$id_alat= $data['id_alat'];
	$jumlah_pinjam= $data['jumlah_pinjam'];
	$jumlah_alat= $data['jumlah_alat'];
	$deal = $jumlah_alat + $jumlah_pinjam;
	if($data['jenis_alat'] == "Tidak Habis Pakai"){
	$result=mysqli_query($connection, "UPDATE alat SET status_alat='Tersedia' WHERE id_alat='$id_alat'") or trigger_error(mysql_error().$result);
	$hasil=mysqli_query($connection, "UPDATE keranjang SET status_keranjang='Dibatalkan' WHERE id='$id_keranjang'") or trigger_error(mysql_error().$hasil);};
	if($data['jenis_alat'] == "Habis Pakai"){
		$result=mysqli_query($connection, "UPDATE alat SET jumlah_alat=$deal WHERE id_alat='$id_alat'") or trigger_error(mysql_error().$result);
	$hasil=mysqli_query($connection, "UPDATE keranjang SET status_keranjang='Dibatalkan' WHERE id='$id_keranjang'") or trigger_error(mysql_error().$hasil);};
	header("location:../Siswa/Keranjang/");
?>