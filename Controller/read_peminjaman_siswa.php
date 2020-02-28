<?php
	include 'config.php';
	session_start();
	$akun_id= $_SESSION['id'];
	$result = mysqli_query($connection, "SELECT peminjaman.id_peminjaman,peminjaman.status_peminjaman,peminjaman.tanggal_pengembalian,peminjaman.tanggal_peminjaman,akun.nama FROM peminjaman INNER JOIN akun ON peminjaman.id_guru = akun.id WHERE akun_id='$akun_id' AND (status_peminjaman='Menunggu Persetujuan Guru' OR status_peminjaman='Menunggu Persetujuan Aspiran' OR status_peminjaman='Dipinjam') ORDER BY id_peminjaman DESC");
?>
