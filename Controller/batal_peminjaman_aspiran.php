<?php
	include 'config.php';
	$id_peminjaman = $_GET['id_peminjaman'];
	$cek=mysqli_query($connection, "SELECT detail_peminjaman.detail_jumlah_pinjam,alat.jumlah_alat,alat.jenis_alat,detail_peminjaman.id,alat.id_alat,alat.nama_alat,detail_peminjaman.status_detail,alat.kondisi_alat,alat.jenis_alat FROM detail_peminjaman INNER JOIN alat ON detail_peminjaman.alat_id_alat = alat.id_alat WHERE detail_peminjaman.peminjaman_id_peminjaman='$id_peminjaman'");
	while($id_alat= mysqli_fetch_array($cek)){
		$alat_id = $id_alat['id_alat'];
		$jenis = $id_alat['jenis_alat'];
		echo $alat_id;
		if($jenis == "Tidak Habis Pakai"){
			$result=mysqli_query($connection, "UPDATE alat SET status_alat='Tersedia' WHERE id_alat='$alat_id'") or trigger_error(mysql_error().$result);
		}
		elseif($jenis == "Habis Pakai"){
		$jumlah_alat = $id_alat['jumlah_alat'];
		$jumlah_pinjam = $id_alat['detail_jumlah_pinjam'];
		$femmy = $jumlah_alat + $jumlah_pinjam;
			$result=mysqli_query($connection, "UPDATE alat SET jumlah_alat='$femmy' WHERE id_alat='$alat_id'") or trigger_error(mysql_error().$result);
		};
	};
	$hasil=mysqli_query($connection, "UPDATE peminjaman SET status_peminjaman='Ditolak Oleh Aspiran' WHERE id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$hasil);
	header("location:../Aspiran/Perizinan/");
?>