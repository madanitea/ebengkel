<?php
		include "config.php";
		if($connection){ echo "konek"; };
		$i=0;
		if($_FILES['file']['name']){
			$filename = explode('.',$_FILES['file']['name']);
			if($filename[1] == 'csv'){
				$handle = fopen($_FILES['file']['tmp_name'], "r");
				while(($data = fgetcsv($handle, 10000, ",")) !== FALSE){
					//echo "loop";
					$no_seri_alat = mysqli_real_escape_string($connection, $data[0]);
					$nama = mysqli_real_escape_string($connection, $data[1]);
					$kondisi_alat = mysqli_real_escape_string($connection, $data[2]);
					$jenis_alat = mysqli_real_escape_string($connection, $data[3]);
					$jumlah = mysqli_real_escape_string($connection, $data[4]);
					$lokasi = mysqli_real_escape_string($connection, $data[5]);
					$gambar_alat = "../img/alat/no_image.png";
					$status_alat = "Tersedia";
					//$no_seri_alat = $data[0];
					//$nama = $data[1];
					//$kondisi_alat = $data[2];
					//$jenis_alat = $data[3];
					//$jumlah = $data[4];
					//$lokasi = $data[5];
//			$sql="INSERT INTO alat(no_seri_alat,nama_alat,kondisi_alat,jenis_alat,gambar_alat,status_alat,jumlah_alat,lokasi_alat) VALUES('$no_seri_alat','$nama','$kondisi_alat','$jenis_alat','$gambar_alat','$status_alat','$jumlah','$lokasi')";
					if($i>0){
						$masuk = "masuktea";
						echo $masuk;
						echo $nama."<br>";
						echo $no_seri_alat."<br>";
						echo $kondisi_alat."<br>";
						echo $jenis_alat."<br>";
						echo $jumlah."<br>";
						echo $lokasi."<br>";
						echo $gambar_alat."<br>";
						echo $status_alat+"<br>";
						if($jenis_alat == "Tidak Habis Pakai"){
						$save = mysqli_query($connection, "INSERT INTO alat(no_seri_alat,nama_alat,kondisi_alat,jenis_alat,gambar_alat,status_alat,lokasi_alat) VALUES('$no_seri_alat','$nama','$kondisi_alat','$jenis_alat','$gambar_alat','$status_alat','$lokasi')") or mysqli_error($connection);
						}else{
						$save = mysqli_query($connection, "INSERT INTO alat(no_seri_alat,nama_alat,kondisi_alat,jenis_alat,gambar_alat,status_alat,jumlah_alat,lokasi_alat) VALUES('$no_seri_alat','$nama','$kondisi_alat','$jenis_alat','$gambar_alat','$status_alat','20','$lokasi')") or mysqli_error($connection);
						}
						if($save){
							echo "saved";
						}else{ echo "not saved"; }
					};
					$i++;
				}
				fclose($handle);
				?><script type="text/javascript">
					alert("Data barang berhasil diimport, klik 'ok' untuk melanjutkan.");
					window.location.replace("../admin/data barang/");
				</script><?php
			}
			else{
				// header("location=../admin/data barang/");
				?><script type="text/javascript">
					alert("Hanya file berformat csv yang didukung !");
					window.location.replace("../admin/data barang/");
				</script><?php
			}
		}
?>
