<?php // connect.php
$db_hostname = 'localhost';
$db_database = 'pets';
$db_username = 'root';
$db_password = 'rootPassword';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database) or die("Unable to select DB: " . mysql_error());
?>