<?php
require_once 'connect.php';
$connection =
  new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password'])) {
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $username = $_POST['username'];
   $password = $_POST['password'];

} else {
    die("Please fill out all of the sign-up form!");
}

$salt1 = 'q@w#';
$salt2 = 'r$t%';

$token = hash('ripemd128', "$salt1$password$salt2");

add_user($connection, $firstname, $lastname, $username, $token);

function add_user($connection, $fn, $sn, $un, $pw){
  global $connection;
  $query = "INSERT into users VALUES('$fn', '$sn', '$un', '$pw')";
  $result = $connection->query($query);
  if (!$result) {
   die($connection->error);
   } else {
    //echo "Sign-up Successful!";
    header("Location: http://ec2-54-172-219-112.compute-1.amazonaws.com/project/sign_in.html");
   }
}


?>