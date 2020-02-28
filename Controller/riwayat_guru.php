<?php
	include 'config.php';
	session_start();
	$akun_id= $_SESSION['id'];
	$result = mysqli_query($connection, "SELECT akun.tingkat,akun.kelas,peminjaman.id_peminjaman,peminjaman.status_peminjaman,peminjaman.tanggal_pengembalian,peminjaman.tanggal_peminjaman,akun.nama FROM peminjaman INNER JOIN akun ON peminjaman.akun_id = akun.id WHERE id_guru='$akun_id' AND (status_peminjaman='Dikembalikan' OR status_peminjaman='Ditolak Oleh Guru' OR status_peminjaman='Ditolak Oleh Aspiran') ORDER BY id_peminjaman DESC");
?>