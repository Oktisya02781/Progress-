<?php
	//koneksi ke database
	$servername="localhost";
	$username="root";
	$password="";
	$db="rental_mobil";
	$conn=mysqli_connect($servername,$username,$password,$db);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
?>