<?php
	include "koneksi.php";
	session_start();
	$user=$_POST["tuser"];
	$pass=$_POST["tpass"];
	$sql="select * from user where username='$user' and password='$pass'";
	$hasil=$conn->query($sql);
	if ($hasil->num_rows>0){
		$_SESSION["username"]=$user;
		header("location:dashboard/index.php");
		$conn->close();
	} else {
		$conn->close();
		header("location:login.php?pesan=gagal");
	}
?>