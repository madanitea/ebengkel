<?php
include 'config.php';
if (!isset($_GET['filter'])) {
	$result = mysqli_query($connection, "SELECT peminjaman.id_guru,peminjaman.status_peminjaman,peminjaman.id_peminjaman,peminjaman.id_guru,akun.nama,akun.kelas,akun.tingkat,peminjaman.tanggal_peminjaman,peminjaman.tanggal_pengembalian,peminjaman.denda FROM peminjaman INNER JOIN akun ON peminjaman.akun_id = akun.id WHERE status_peminjaman='Dikembalikan' ORDER BY id_peminjaman DESC");
}else{
$dari=$_GET['dari'];
$sampai=$_GET['sampai'];
if ($dari == 0000-00-00) {
	$dari="0000-00-00";
}
if($sampai == 0000-00-00){
	$sampai="9999-12-30";
}
$result = mysqli_query($connection, "SELECT peminjaman.id_guru,peminjaman.status_peminjaman,peminjaman.id_peminjaman,peminjaman.id_guru,akun.nama,akun.kelas,akun.tingkat,peminjaman.tanggal_peminjaman,peminjaman.tanggal_pengembalian,peminjaman.denda FROM peminjaman INNER JOIN akun ON peminjaman.akun_id = akun.id WHERE status_peminjaman='Dikembalikan' AND tanggal_peminjaman BETWEEN '$dari' AND '$sampai' ORDER BY id_peminjaman DESC");
}
?>