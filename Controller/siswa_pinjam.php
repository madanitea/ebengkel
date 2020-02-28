<?php
	include 'config.php';
	$id_peminjaman=$_POST['id_peminjaman'];
	$penanggung_jawab=$_POST['guru'];
	echo $penanggung_jawab;
	$result = mysqli_query($connection, "UPDATE peminjaman SET status_peminjaman='Menunggu Persetujuan Guru',id_guru='$penanggung_jawab' where id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$result);
	header("location:../Siswa/Keranjang/");
?>