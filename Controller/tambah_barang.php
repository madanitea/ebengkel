<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<?php
include 'config.php';
	$nama = $_POST['nama'];
	$kondisi = $_POST['kondisi'];
	$jenis = $_POST['jenis'];
	$lokasi = $_POST['lokasi'];
	$no_seri_alat = $_POST['no_seri_alat'];
	$jumlah = $_POST['jumlah'];
	$ket = $_POST['keterangan'];
	$status_alat = "Tersedia";
	$seri = mysqli_query($connection, "SELECT no_seri_alat FROM alat WHERE no_seri_alat='$no_seri_alat'");
	$fathimah = mysqli_num_rows($seri);
	if($fathimah > 0){
		header("location:../Admin/Tambah Barang/?msg=error&seri=$no_seri_alat");
	}else{
	$choose= mysqli_query($connection,"SELECT id_alat FROM alat GROUP BY id_alat DESC LIMIT 1");
	$fetch = mysqli_fetch_array($choose);
	$read = $fetch['id_alat']+1;
	if($jenis == "Habis Pakai" AND $jumlah < 1){
		header("location:../Admin/Tambah Barang/?msg=error1");
	}else{
	$target_dir = "../img/alat/";
	if ($_FILES["gambar"]["name"] == NULL) {
		$upload_file = $target_dir.'no_image'.'.png';
		if($jenis == "Tidak Habis Pakai"){
		    			$result = mysqli_query($connection, "INSERT INTO alat(nama_alat,kondisi_alat,jenis_alat,lokasi_alat,no_seri_alat,gambar_alat,status_alat,ket_alat)VALUES('$nama','$kondisi','$jenis','$lokasi','$no_seri_alat','$upload_file','$status_alat','$ket')");
			        header('location:../Admin/Tambah Barang/?msg=sukses');
		    		}else{
		    			$result = mysqli_query($connection, "INSERT INTO alat(nama_alat,kondisi_alat,jenis_alat,lokasi_alat,no_seri_alat,gambar_alat,status_alat,jumlah_alat,ket_alat)VALUES('$nama','$kondisi','$jenis','$lokasi','$no_seri_alat','$upload_file','$status_alat','$jumlah','$ket')");
			        header('location:../Admin/Tambah Barang/?msg=sukses');
		    		}
	}else{
		$target_file = $target_dir . (string)date('Y-m-d h.m.s') . basename($_FILES["gambar"]["name"]);
		$uploadOk = 1;
		$uploadFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$upload_file = $target_dir.'Alat-'.$read.'-'.(string)date('Y-m-d h.m.s').'.'.$uploadFileType;
		// Allow certain file formats
		if($uploadFileType != "png" AND $uploadFileType != "jpg" AND $uploadFileType != "jpeg" AND $uploadFileType != "img") {
			echo "<div class='alert alert-warning alert-dismissible'>";
			echo "<a href='../admin/Tambah Barang/' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
	  		echo "<strong>Peringatan!</strong> Maaf, hanya menerima gambar dengan extension (.png, .jpg, .jpeg, .img).";
			echo "</div>";
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
			echo "<div class='alert alert-warning alert-dismissible'>";
			echo "<a href='../admin/Tambah Barang/' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
	  		echo "<strong>Peringatan!</strong> Maaf, gambar tidak dapat di upload.";
			echo "</div>";
		// if everything is ok, try to upload file
		} else {
		    	if (move_uploaded_file($_FILES["gambar"]["tmp_name"],$upload_file)) {
		    		if($jenis == "Tidak Habis Pakai"){
		    			$result = mysqli_query($connection, "INSERT INTO alat(nama_alat,kondisi_alat,jenis_alat,lokasi_alat,no_seri_alat,gambar_alat,status_alat,ket_alat)VALUES('$nama','$kondisi','$jenis','$lokasi','$no_seri_alat','$upload_file','$status_alat','$ket')");
			        header('location:../Admin/Tambah Barang/?msg=sukses');
		    		}else{
		    			$result = mysqli_query($connection, "INSERT INTO alat(nama_alat,kondisi_alat,jenis_alat,lokasi_alat,no_seri_alat,gambar_alat,status_alat,jumlah_alat,ket_alat)VALUES('$nama','$kondisi','$jenis','$lokasi','$no_seri_alat','$upload_file','$status_alat','$jumlah','$ket')");
			        header('location:../Admin/Tambah Barang/?msg=sukses');
		    		}
			        
			        // _insert($result);

			    } else {
					echo "<div class='alert alert-warning alert-dismissible'>";
					echo "<a href='../admin/Tambah Barang/' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			  		echo "<strong>Peringatan!</strong> Maaf, telah terjadi kesalahan dalam proses upload.";
					echo "</div>";
			    }
		}
	};
	};
};
?>