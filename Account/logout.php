<?php 
    session_start();
     unset($_SESSION['loggedin']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);

    session_destroy();
     header("location: login.php ");
?>