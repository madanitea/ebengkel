<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = '';
$databaseName = '';
$databaseUsername = '';
$databasePassword = '';
$system_email = "";
$system_password = "";
$apphost = "";
$connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die(mysql_error());
//var_dump($connection);
?>
