<?php
error_reporting(null);
session_start();
include "../bag_header.php";
include "../bag_nav.php";
include "../koneksi.php";

?>
<div class="col-sm-9">
  <?php
  $iduser =$_GET['iduser'];
  $sql="SELECT t.iduser, t.username, t.password  from user t where iduser='$iduser'";
  $det = $conn->query($sql) or die(mysql_error());
  while($d = $det->fetch_array()){
    ?>
    <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-car"></i>Edit User</div>
      <div class="panel-body">

        <form action="update.php" method="post" enctype="multipart/form-data">
          <table class="table">
            <tr><td></td>
              <td><input type="hidden" name="iduser"
                value="<?php echo $d['iduser'] ?>"></td>
              </tr>
<tr>
  <td>Username</td>
  <td><input type="text" class="form-control" name="username"
    value="<?php echo $d['username'] ?>"></td>
  </tr>
  <tr>
    <td>Password</td>
      <td><input type="text" class="form-control" name="password"
        value="<?php echo $d['password'] ?>"></td>
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
		
    
  </div>
</div>
</div>
  <?php
    }
    ?>
<?php require_once "../bag_footer.php";  ?>