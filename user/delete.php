<?php
include "../koneksi.php";
$iduser=$_GET['iduser'];
$sql = "delete from user where iduser='$iduser'";
echo "$sql";
$hasil = $conn->query($sql);

if($hasil)  header("location:index.php"); else  echo "Hapus Data Gagal"; ?>
