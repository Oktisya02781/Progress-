<?php
include "../koneksi.php";
//error_reporting(null);
//session_start();

$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];

  $sql="select max(id_jenis) as maks from tipe";
  $hasil=$conn->query($sql);
  $row=$hasil->fetch_assoc();
  $id=$row["maks"]+1;
  $sql = "insert into tipe values('$id_jenis','$nama_jenis')";
  $hasil = $conn->query($sql);

if($hasil==True){
  header("location:index.php");
}else{
  echo "Penyimpanan gagal";
}
?>
