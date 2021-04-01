<?php
$user=$_SESSION["username"];
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
<title>Rental Mobil C-STORE</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='../assets/vendor/jquery/jquery-3.4.1.min.js'></script>
<link href='../assets/vendor/bootstrap-4.2.1-dist/css/bootstrap.min.css' rel='stylesheet' />
<script src='../assets/vendor/bootstrap-4.2.1-dist/js/bootstrap.min.js''></script>
<link href='../assets/vendor/font-awesome/css/font-awesome.min.css' rel='stylesheet'
type='text/css'>
<style>
.jumbotron {
background: url('../Img/thrift.jfif') no-repeat center center;
background-size: cover;
height:250px;
}
</style>
</head>
<body>
<div class='jumbotron text-left'>
<div class='display-4 text-light font-weight-bold'>
BEKAS BAGUS</div>
<div class='font-weight-bold text-light'>
Preloved dan Thrifting Terpercaya</div>
</div>
<div class='container-fluid'>
<div class='row '>

<div class='col-sm-12'>
<!-- <nav class='navbar navbar-expand-sm navbar-light justify-content-end'> -->
<nav class='navbar navbar-expand-sm navbar-primary justify-content-end'>
<ul class='navbar-nav'>
<li class='nav-item '>
<a class='nav-link' href='#'>$user</a>
</li>
<li class='nav-item' style='float:right;'>
<a class='nav-link' href='../logout.php'>

<i class='fa fa-sign-out fa-fw'></i> Logout</a>

</li>
</ul>
</nav>
</div>

</div>";
?>