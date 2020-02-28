<?php
	
	include 'config.php';
	session_start();
	$akun_id= $_SESSION['id'];
	$result = mysqli_query($connection, "SELECT alat.ket_alat,keranjang.jumlah_pinjam,keranjang.id,alat.id_alat,alat.nama_alat,alat.kondisi_alat,alat.jenis_alat,alat.no_seri_alat FROM keranjang INNER JOIN alat ON keranjang.alat_id_alat = alat.id_alat INNER JOIN akun ON akun.id = keranjang.akun_id_siswa WHERE akun_id_siswa='$akun_id' AND status_keranjang='Dikeranjangkan'");
?>