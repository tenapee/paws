<?php

if (! isset($_SESSION['username'])) {
    //header("Location: http://ec2-54-172-219-112.compute-1.amazonaws.com/project/sign_in.html");
    echo "User: " . $_SESSION['username'];
} elseif (isset($_SESSION['username'])) {
     echo "Pets!";
 } else {
    echo "poo";
}

?>