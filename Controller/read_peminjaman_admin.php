3<?php
include 'config.php';
$result = mysqli_query($connection, "SELECT peminjaman.id_guru,peminjaman.id_peminjaman,peminjaman.status_peminjaman,peminjaman.tanggal_pengembalian,akun.kelas,akun.tingkat,peminjaman.tanggal_peminjaman,akun.nama FROM peminjaman INNER JOIN akun ON peminjaman.akun_id = akun.id WHERE status_peminjaman='Dipinjam'");
?>