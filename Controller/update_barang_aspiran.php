<?php
include "config.php";
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$kondisi = $_POST['kondisi'];
	$lokasi = $_POST['lokasi'];
	$jumlah = $_POST['jumlah'];
	$ket = $_POST['ket'];
	$jenis = $_POST['jenis_alat'];
	$read = $_POST['id']+1;
	$target_dir = "../img/alat/";
	if ($_FILES["gambar"]["name"] == NULL) {
		$upload_file = $target_dir.'no_image'.'.png';
		if ($jenis == "Tidak Habis Pakai") {
		mysqli_query($connection,"update alat set nama_alat='$nama', lokasi_alat='$lokasi', kondisi_alat='$kondisi', gambar_alat='$upload_file' where id_alat='$id'");
		}
		else{
		mysqli_query($connection,"update alat set ket_alat='$ket',jumlah_alat='$jumlah',nama_alat='$nama', lokasi_alat='$lokasi', kondisi_alat='$kondisi', gambar_alat='$upload_file' where id_alat='$id'");
		};
	}
	else{
		$target_file = $target_dir . (string)date('Y-m-d h.m.s') . basename($_FILES["gambar"]["name"]);
		$uploadOk = 1;
		$uploadFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$upload_file = $target_dir.'Alat-'.$read.'-'.(string)date('Y-m-d h.m.s').'.'.$uploadFileType;
		// Allow certain file formats
		if($uploadFileType != "png" AND $uploadFileType != "jpg" AND $uploadFileType != "jpeg" AND $uploadFileType != "img") {
			echo "<div class='alert alert-warning alert-dismissible'>";
			echo "<a href='../aspiran/Data Barang/' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
	  		echo "<strong>Peringatan!</strong> Maaf, hanya menerima gambar dengan extension (.png, .jpg, .jpeg, .img).";
			echo "</div>";
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
			echo "<div class='alert alert-warning alert-dismissible'>";
			echo "<a href='../aspiran/Data Barang/' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
	  		echo "<strong>Peringatan!</strong> Maaf, gambar tidak dapat di upload.";
			echo "</div>";
		// if everything is ok, try to upload file
		} else {
		    	if (move_uploaded_file($_FILES["gambar"]["tmp_name"],$upload_file)) {
		    		if ($jenis == "Tidak Habis Pakai") {
						mysqli_query($connection,"update alat set nama_alat='$nama', lokasi_alat='$lokasi', kondisi_alat='$kondisi', gambar_alat='$upload_file' where id_alat='$id'");
					}
					else{
					mysqli_query($connection,"update alat set ket_alat='$ket',jumlah_alat='$jumlah',nama_alat='$nama', lokasi_alat='$lokasi', kondisi_alat='$kondisi', gambar_alat='$upload_file' where id_alat='$id'");
					};
			    header('location:../aspiran/Data Barang/?msg=sukses');
		    	}
			        
			        // _insert($result);
				else {
					echo "<div class='alert alert-warning alert-dismissible'>";
					echo "<a href='../aspiran/Data Barang/' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			  		echo "<strong>Peringatan!</strong> Maaf, telah terjadi kesalahan dalam proses upload.";
					echo "</div>";
			    }
		}
	};
	header ("location:../aspiran/data barang");
?>
