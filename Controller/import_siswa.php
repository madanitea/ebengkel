<?php
		include "config.php";
		if($_FILES['file']['name']){
			$filename = explode('.',$_FILES['file']['name']);
			if($filename[1] == 'csv'){
				$handle = fopen($_FILES['file']['tmp_name'], "r");
				while($data = fgetcsv($handle)){
					$email = mysqli_real_escape_string($connection, $data[0]);
					$nama = mysqli_real_escape_string($connection, $data[1]);
					$password = md5(mysqli_real_escape_string($connection, $data[2]));
					$tingkat = mysqli_real_escape_string($connection, $data[3]);
					$kelas = mysqli_real_escape_string($connection, $data[4]);
					$no_hp = mysqli_real_escape_string($connection, $data[5]);
					$level = "siswa";
					$sql="INSERT INTO akun(email,nama,password,tingkat,kelas,no_hp,level) VALUES('$email','$nama','$password','$tingkat','$kelas','$no_hp','$level')";
					mysqli_query($connection, $sql);
				}
				fclose($handle);
				?><script type="text/javascript">
					alert("Data siswa berhasil diimport, klik 'ok' untuk melanjutkan.");
					window.location.replace("../admin/data siswa/");
				</script><?php
			}
			else{
				header("location=../admin/data siswa/");
				?><script type="text/javascript">
					alert("Hanya file berformat csv yang didukung !");
					window.location.replace("../admin/data siswa/");
				</script><?php
			}
		}
?>