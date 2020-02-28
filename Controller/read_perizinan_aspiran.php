<?php
	include 'config.php';
	session_start();
	$akun_id= $_SESSION['id'];
	$result = mysqli_query($connection, "SELECT akun.kelas,akun.tingkat,peminjaman.id_guru,peminjaman.id_peminjaman,akun.nama FROM peminjaman INNER JOIN akun ON peminjaman.akun_id = akun.id WHERE status_peminjaman='Menunggu Persetujuan Aspiran'");
?>