<?php
	include "../koneksi.php";

	$id_pelanggan = $_POST['id_pelanggan'];
	$no_ktp = $_POST['no_ktp'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat_pelanggan = $_POST['alamat_pelanggan'];
	$no_telepon = $_POST['no_telepon'];
	$status_peminjaman = $_POST['status_peminjaman'];

	// Cek apakah ingin mengubah fotonya atau tidak
	if(isset($_POST['ubah_foto'])){ // Jika menceklis checkbox yang ada di form ubah, lakukan :
		$nama_gambar = $_FILES['foto']['name'];
		$sumber = $_FILES['foto']['tmp_name'];

	// Rename nama fotonya dengan menambahkan tanggal upload
	$fotobaru = "gambar/".date('d-m-Y').$nama_gambar;
	$baru = "gambar/".$fotobaru;
		
	if(move_uploaded_file($sumber,$fotobaru)){ // Cek apakah gambar berhasil diupload atau tidak
		$sql = "SELECT p.id_pelanggan, p.no_ktp, p.foto_pelanggan, p.nama_lengkap, p.tanggal_lahir, p.alamat_pelanggan,
		p.no_telepon, p.status_peminjaman
		from pelanggan p where id_pelanggan='$id_pelanggan'";
		$hasil = $conn->query($sql);
		$data = $hasil->fetch_array();
	
		// Cek apakah file gambar sebelumnya ada di folder gambar
		if(is_file("gambar/".$data['foto_pelanggan'])) // Jika gambar ada
			unlink("gambar/".$data['foto_pelanggan']); // Hapus file gambar sebelumnya
		
			// Proses ubah data ke Database
			$sql = "update pelanggan set foto_pelanggan='$nama_gambar',
			id_pelanggan='$id_pelanggan', no_ktp='$no_ktp', nama_lengkap='$nama_lengkap', tanggal_lahir='$tanggal_lahir',
			alamat_pelanggan='$alamat_pelanggan', no_telepon='$no_telepon', status_peminjaman='$status_peminjaman' where id_pelanggan='$id_pelanggan'";
			$hasil = $conn->query($sql); // Eksekusi/ Jalankan query dari variabel $query
			if($hasil){
				header("location: index.php"); // Redirect ke halaman index.php
			}else{
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				echo "<br><a href='index.php'>Kembali Ke Form</a>";
			}
		
		}else{
		// Jika gambar gagal diupload, Lakukan :
			echo "<script> alert('Maaf, Gambar gagal untuk diupload');
			location = 'index.php';
			</script>";
		}

	}else{
		// Jika tidak menceklis checkbox yang ada di form ubah, lakukan :
		$sql = "update pelanggan set id_pelanggan='$id_pelanggan', no_ktp='$no_ktp', nama_lengkap='$nama_lengkap',
		tanggal_lahir='$tanggal_lahir',	alamat_pelanggan='$alamat_pelanggan', no_telepon='$no_telepon',
		status_peminjaman='$status_peminjaman' where id_pelanggan='$id_pelanggan'";
		$hasil = $conn->query($sql);
		
		if($hasil){
			header("location: index.php"); // Redirect ke halaman index.php
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database2.";
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
		}
	}
?>