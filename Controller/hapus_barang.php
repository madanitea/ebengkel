<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($connection,"DELETE FROM alat WHERE id_alat = '$id'")or die(mysql_error());
header("location:../admin/data barang");
?>