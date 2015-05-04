<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);

destroy_session_and_data();

function destroy_session_and_data()
 {
    $_SESSION = array();
    session_destroy();
    setcookie(session_name(), '', time() - 2592000, '/');
 }

header("Location: ../sign_in.php");
?>