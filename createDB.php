<?php
include "koneksi2.php";
// Create database
$sql = "CREATE DATABASE rental_mobil";
if ($conn->query($sql) === TRUE){
	echo "Database created successfully";
} else {
echo "Error creating database: " . $conn->error;
}
$conn->close();
?>