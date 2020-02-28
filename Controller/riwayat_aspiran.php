<?php
	include 'config.php';
	session_start();
	$akun_id= $_SESSION['id'];
	$result = mysqli_query($connection, "SELECT peminjaman.struk_peminjaman,peminjaman.id_guru,peminjaman.status_peminjaman,peminjaman.id_peminjaman,peminjaman.id_guru,akun.nama,akun.kelas,akun.tingkat,peminjaman.tanggal_peminjaman,peminjaman.tanggal_pengembalian,peminjaman.denda FROM peminjaman INNER JOIN akun ON peminjaman.akun_id = akun.id WHERE status_peminjaman!='Menunggu Persetujuan Guru' AND status_peminjaman!='Menunggu Persetujuan Aspiran' AND status_peminjaman!='Dipinjam' AND status_peminjaman!='Ditolak Oleh Guru' ORDER BY id_peminjaman DESC");
?>