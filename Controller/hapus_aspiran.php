<?php
include 'config.php';
$id = $_GET['id'];
echo $id;
mysqli_query($connection,"DELETE FROM akun WHERE id='$id' AND level='aspiran'") or trigger_error(mysql_error());
header("location:../admin/data aspiran");
?>