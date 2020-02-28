<?php
include "config.php";
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];

if(empty($_POST['password'])){
	mysqli_query($connection,"update akun set nama='$nama', no_hp='$no_hp' , email='$email' where id='$id'");
}
else{
	$password = md5($_POST['password']);
	mysqli_query($connection,"update akun set nama='$nama', no_hp='$no_hp' , email='$email' , password='$password' where id='$id'");
}
	header ("location:../admin/data aspiran");
?>