<?php
session_start();
// remove session variables
unset($_SESSION['username']);
header("location:login.php");
?>