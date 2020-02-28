<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($connection,"DELETE FROM pemberitahuan WHERE id = '$id'")or die(mysql_error());
header("location:../admin/data pemberitahuan");
?>