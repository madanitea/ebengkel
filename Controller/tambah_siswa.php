<?php
include 'config.php';
	$nama = $_POST['nama'];
	$kelas =  $_POST['kelas'];
	$tingkat = $_POST['tingkat'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$level = 'siswa';

	$result = mysqli_query($connection, "INSERT INTO akun(email,nama,password,tingkat,kelas,no_hp,level)VALUES('$email','$nama','$password','$tingkat','$kelas','$no_telp','$level')") or trigger_error(mysql_error().$result);
	if ($result) {
		header("location:../Admin/Tambah Siswa");
	}
	else {
		?>
			<script type="text/javascript">
				alert("Data gagal diinputkan");
			</script>
		<?php
	};
?>