<?php
include "config.php";
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tingkat = $_POST['tingkat'];
	$kelas = $_POST['kelas'];
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];

if (empty($_POST['password'])) {
	mysqli_query($connection,"update akun set nama='$nama', tingkat='$tingkat', kelas='$kelas' , no_hp='$no_hp' , email='$email' where id='$id'");
}
else{
	$password = md5($_POST['password']);
mysqli_query($connection,"update akun set nama='$nama', tingkat='$tingkat', kelas='$kelas' , no_hp='$no_hp' , email='$email' , password='$password' where id='$id'");
}
	header ("location:../Siswa/Edit Profil");
?>