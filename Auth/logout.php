<?php 
session_start();


unset($_SESSION['fullname']);
unset($_SESSION['email']);
unset($_SESSION['userId']);
session_unset();
session_destroy();

header("Location: ./login.php");