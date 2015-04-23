<?php
require_once 'connect.php';
$connection =
  new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['username']) &&
    isset($_POST['password'])) {
  $un_temp = mysql_entities_fix_string($connection, $_POST['username']);
  $pw_temp = mysql_entities_fix_string($connection, $_POST['password']);

  $query = "SELECT * FROM users WHERE username='$un_temp'";
  $result = $connection->query($query);
  if (!$result) die($connection->error);
  elseif ($result->num_rows) {
    $row = $result->fetch_array(MYSQLI_NUM);

    $result->close();

    $salt1 = 'q@w#';
    $salt2 = 'r$t%';
    $token = hash('ripemd128', "$salt1$pw_temp$salt2");

    if ($token == $row[3]) {
          session_start();
          $_SESSION['username'] = $un_temp;
          $_SESSION['password'] = $pw_temp;
          $_SESSION['firstname'] = $row[0];
          $_SESSION['lastname'] = $row[1];
          echo "$row[0] $row[1]: Hi $row[0], you are logged in as " . $_SESSION['username'];
          die( header("Location: http://ec2-54-172-219-112.compute-1.amazonaws.com/project"));
          //die("<p><a href=../index.html>Click here to continue</a></p>");
        }
    else die("Invalid username/password combination");
  }
  else die("Invalid username/password combination");
} else {
  die("Please enter your username and password");
}

$connection->close();

function mysql_entities_fix_string($connection, $string) {
  global $connection;

  return htmlentities(mysql_fix_string($connection, $string));
}

function mysql_fix_string($connection, $string) {
  global $connection;
  if (get_magic_quotes_gpc()) $string = stripslashes($string);
  return $connection->real_escape_string($string);
}
?>