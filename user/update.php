<?php
include "../koneksi.php";

$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];


 $sql = "update tipe set nama_jenis='$nama_jenis',
 where id_jenis='$id_jenis'";

  $hasil = $conn->query($sql); // Eksektsi/ Jalankan qtery dari variabel $qtery
  if($hasil){
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='index.php'>Kembali Ke Form</a>";
  }

?>
