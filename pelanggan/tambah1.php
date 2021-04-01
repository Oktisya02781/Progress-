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
$tangallahir = $_POST["tanggal_lahir"];
$alamat = $_POST["alamat_pelanggan"];
$telepon = $_POST["no_telepon"];
$status = $_POST["status_peminjaman"];
$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
if($pindah){
$sql="select max(id_pelanggan) as maks from pelanggan ";
$hasil=$conn->query($sql);
$row=$hasil->fetch_assoc();
$id=$row["maks"]+1;
$sql = "insert into pelanggan values('$id_pelanggan','$no_ktp','$nama_gambar',
'$nama','$tanggallahir','$alamat_pelanggan','$telepon','$status')";
$hasil = $conn->query($sql);
}
if($hasil==True)
header("location:index.php");
else
echo "Penyimpanan gagal";
?>