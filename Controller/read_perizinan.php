<?php
	include 'config.php';
	session_start();
	$akun_id= $_SESSION['id'];
	$result = mysqli_query($connection, "SELECT akun.kelas,akun.tingkat,peminjaman.id_peminjaman,akun.nama FROM peminjaman INNER JOIN akun ON peminjaman.akun_id = akun.id WHERE id_guru='$akun_id' AND status_peminjaman='Menunggu Persetujuan Guru'");
?>