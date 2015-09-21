<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "final";

$con = mysql_connect( $servername, $username, $password) or die('Could not connect to server.' );
mysql_select_db($db_name, $con) or die('Could not select database.');
?>