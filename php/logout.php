<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);

header("Location: ../index.html");
?>