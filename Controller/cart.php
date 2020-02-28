<?php
include 'config.php';
	$siswa_id = $_POST['siswa_id'];
	$id_alat = $_POST['id_alat'];
	$jenis = $_POST['jenis_alat'];
	$kondisi_alat1 = mysqli_query($connection, "SELECT jumlah_alat,status_alat,nama_alat,kondisi_alat FROM alat where id_alat='$id_alat'");
	$kondisi_alat2 = mysqli_fetch_array($kondisi_alat1);
	$kondisi_alat = $kondisi_alat2['kondisi_alat'];
	$status_alat = $kondisi_alat2['status_alat'];
	$nama= $kondisi_alat2['nama_alat'];
	if($jenis == "Tidak Habis Pakai"){
		if ($status_alat == "Tersedia"){
			if ($kondisi_alat == "Rusak") {
				header("location:../Siswa/Data Barang/?msg=error2");
		}else{
	$hasil = mysqli_query($connection,"update alat set status_alat='Dipinjam' where id_alat='$id_alat'") or trigger_error(mysqli_error($connection));
	$query= mysqli_query($connection,"INSERT INTO keranjang(alat_id_alat,akun_id_siswa,status_keranjang) VALUES('$id_alat','$siswa_id','Dikeranjangkan')") or trigger_error(mysqli_error($connection));
			if ($query) {
			header("location:../Siswa/Data Barang/?msg=sukses");}
		}
		}else{
			header("location:../Siswa/Data Barang/?msg=error5");
		}
	}elseif($jenis == "Habis Pakai"){
	$jumlah = $_POST['jumlah_pinjam'];
	$batas = $kondisi_alat2['jumlah_alat'];
	if($jumlah>$batas){
		header("location:../Siswa/Data Barang/?msg=error");
	}
	elseif($jumlah<1){
		header("location:../Siswa/Data Barang/?msg=error1");
	}else{
		$baru = $batas - $jumlah;
			$hasil = mysqli_query($connection,"update alat set jumlah_alat='$baru' where id_alat='$id_alat'") or trigger_error(mysqli_error($connection));
				$query= mysqli_query($connection,"INSERT INTO keranjang(alat_id_alat,jumlah_pinjam,akun_id_siswa,status_keranjang) VALUES('$id_alat',$jumlah,'$siswa_id','Dikeranjangkan')") or trigger_error(mysqli_error($connection));
	};
	if ($query) {
			header("location:../Siswa/Data Barang/?msg=sukses");
		}
	}
?>
