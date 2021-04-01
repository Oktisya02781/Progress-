<?php
include "../koneksi.php";
$id_pelanggan=$_GET['id_pelanggan'];
$sql = "delete from pelanggan where id_pelanggan='$id_pelanggan'";
echo "$sql";
$hasil = $conn->query($sql);

if($hasil)  header("location:index.php"); else  echo "Hapus Data Gagal"; ?>
