<?php
include 'config.php';
	$nama = $_POST['nama'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$level = 'guru';

	$result = mysqli_query($connection, "INSERT INTO akun(email,nama,password,no_hp,level)VALUES('$email','$nama','$password','$no_telp','$level')") or trigger_error(mysql_error().$result);
	if ($result) {
		header("location:../Admin/Tambah Guru");
	}
	else {
		?>
			<script type="text/javascript">
				alert("Data gagal diinputkan");
			</script>
		<?php
	};
?>