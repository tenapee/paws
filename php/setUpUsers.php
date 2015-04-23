<?php
require_once 'connect.php';
$connection =
  new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($connection->connect_error) die($connection->connect_error);

$query = "DROP TABLE IF EXISTS users";
$result = $connection->query($query) or die($connection->error);

$query = "CREATE table users (
  forename VARCHAR(32) NOT NULL,
  surname VARCHAR(32) NOT NULL,
  username VARCHAR(32) NOT NULL UNIQUE,
  password VARCHAR(32) NOT NULL
)";

$result = $connection->query($query);
if (!$result) die($connection->error);

$salt1 = 'q@w#';
$salt2 = 'r$t%';

$forename = 'Tena';
$surname = 'Percy';
$username = 'tenapercy';
$password = 'mysecret';

$token = hash('ripemd128', "$salt1$password$salt2");

add_user($connection, $forename, $surname, $username, $token);

$forename = 'Bill';
$surname = 'Hooper';
$username = 'billhooper';
$password = 'billspw';

$token = hash('ripemd128', "$salt1$password$salt2");

add_user($connection, $forename, $surname, $username, $token);

function add_user($connection, $fn, $sn, $un, $pw){
  global $connection;
  $query = "INSERT into users VALUES('$fn', '$sn', '$un', '$pw')";
  $result = $connection->query($query);
  if (!$result) die($connection->error);
}


?>