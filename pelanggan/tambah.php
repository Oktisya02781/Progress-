<?php
include "../koneksi.php";
//error_reporting(null);
//session_start();

$id_pelanggan = $_POST["id_pelanggan"];
$noktp = $_POST["no_ktp"];
$sumber = $_FILES["foto_pelanggan"]["tmp_name"];
$target = 'gambar/';
$nama_gambar = $_FILES["foto_pelanggan"]["name"];
$nama = $_POST["nama_lengkap"];
$tanggallahir = $_POST["tanggal_lahir"];
$alamat = $_POST["alamat_pelanggan"];
$telpon = $_POST["no_telpon"];
$status = $_POST["status_peminjaman"];
$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
if($pindah){
$sql="select max(id_pelanggan) as maks from pelanggan ";
$hasil=$conn->query($sql);
$row=$hasil->fetch_assoc();
$id=$row["maks"]+1;
$sql = "insert into pelanggan values('$id_pelanggan','$noktp','$nama_gambar',
'$nama','$tanggallahir','$alamat','$telpon','$status')";
$hasil = $conn->query($sql);
}
if($hasil==True)
header("location:index.php");
else
echo "Penyimpanan gagal";
?>