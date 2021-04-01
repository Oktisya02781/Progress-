<?php
  error_reporting(null);
  session_start();

  include "../bag_header.php";
  include "../bag_nav.php";
  include "../koneksi.php";
?>

<div class="col-sm-9">
<?php
  $id_pelanggan =$_GET['id_pelanggan'];
  $sql="SELECT p.id_pelanggan, p.no_ktp, p.foto_pelanggan, p.nama_lengkap, p.tanggal_lahir, p.alamat_pelanggan,
    p.no_telepon, p.status_peminjaman from pelanggan p where id_pelanggan='$id_pelanggan'";
  $det = $conn->query($sql) or die(mysql_error());
  while($d = $det->fetch_array()){
  ?>
    <div class="panel panel-primary">
    <div class="panel-heading"><i class="fa fa-user"></i>Edit Pelanggan</div>
    <div class="panel-body">
      <form action="update.php" method="post" enctype="multipart/form-data">
      <table class="table">
        <tr><td></td>
          <td><input type="hidden" name="id_pelanggan"
          value="<?php echo $d['id_pelanggan'] ?>"></td>
        </tr>
        <tr>
          <td>Foto</td>
          <td> <img src="gambar/<?php echo $d['foto_pelanggan'] ?>" width="250px"
            height="120px" /></br>
            <input type="checkbox" name="ubah_foto" value="true">
            Ceklis jika ingin mengubah foto<br>
            <input name="foto" type="file" class="form-control">
          </td>
        </tr>
        <tr>
          <td>ID Pelanggan</td>
          <td><input type="number" class="form-control" name="id_pelanggan"
          value="<?php echo $d['id_pelanggan'] ?>"></td>
        </tr>
        <tr>
          <td>No KTP</td>
          <td><input type="number" class="form-control" name="no_ktp"
          value="<?php echo $d['no_ktp'] ?>"></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input type="text" class="form-control" name="nama_lengkap"
          value="<?php echo $d['nama_lengkap'] ?>"></td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td><input type="text" class="form-control" name="tanggal_lahir"
          value="<?php echo $d['tanggal_lahir'] ?>"></td>
        </tr>
        <tr>
          <td>Alamat Pelanggan</td>
          <td><input type="text" class="form-control" name="alamat_pelanggan"
          value="<?php echo $d['alamat_pelanggan'] ?>"></td>
        </tr>
        <tr>
          <td>No Telepon</td>
          <td><input type="text" class="form-control" name="no_telepon"
          value="<?php echo $d['no_telepon'] ?>"></td>
        </tr>
        <tr>
          <td>Status Peminjaman</td>
          <td><input type="number" class="form-control" name="status_peminjaman"
          value="<?php echo $d['status_peminjaman'] ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" class="btn btn-info" value="Simpan">
            <a href="index.php" class="btn btn-danger">Batal</a>
          </td>
        </tr>
      </table>
      </form>

      <?php } ?>
    </div>
    </div>
    </div>
<?php require_once "../footer.php"; ?>