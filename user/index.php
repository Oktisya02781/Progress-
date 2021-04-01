<?php
    //error_reporting(null);
    session_start();
    $path="../";
    include "../bag_header.php";
    include "../bag_nav.php";
    include "../pagination.php";
    include "../koneksi.php";

if (isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
  $keyword= trim($_REQUEST['keyword']);
  $reload= "index.php?pagination=true&keyword=$keyword";
  $sql  = "SELECT u.iduser, u.username, u.password from tb_tser u where u.iduser=u.iduser and u.username
  LIKE '%$keyword%' ORDER BY u.iduser asc";
}else{
    $reload = "index.php?pagination=true";
    $sql = "SELECT u.iduser, u.username, u.password from user u where u.iduser=u.iduser
            ORDER BY u.iduser asc";
      }
    $hasil=$conn->query($sql);


 $rpp   = 5; // jumlah record per halaman
    if (isset($_GET["page"]))
        $page = intval($_GET["page"]);
    else
        $page=0;

    if($page<=0)
        $page = 1;
        $tcount = $hasil->num_rows;
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count= 0;
        $i  = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
?>
<div class="col-sm-9">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h1 class="page-header">User</h1>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-success
          btn-sm"><span class="fa fa-plus"></span> Tambah Data User</button>
    </div>
    <div>
      <!--muncul jika ada pencarian (tombol reset pencarian (kembali))-->
      <?php
      if(isset($_REQUEST["keyword"])){
        if($_REQUEST["keyword"]<>"")
        echo "<a class='btn btn-danger' href='index.php'>Kembali</a>";
      }
      ?>
    </div>
    <div>
      <form method="post" action="index.php">
        <div class="form-grotp input-group">
          <input type="text" name="keyword" class="form-control" placeholder="Search user" value="<?php if(isset($_REQUEST["keyword"])) echo $_REQUEST['keyword']; ?>">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">Cari</button>
          </span>
        </div>
      </form>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>
              <center>
                No
              </center>
            </th>
            <th>
              <center>
                Iduser
              </center>
            </th>
            <th>
              <center>
                username
                </center>
            </th>
            <th>
              <center>
                Password
              </center>
            </th>
            <th>
              <center>
                Opsi
              </center>
            </th>
          </tr>
        </thead>
          <tbody>
            <?php
              while(($count<$rpp) && ($i<$tcount)) {
                $hasil->data_seek($i);
                $data = $hasil->fetch_array();
            ?>
             <tr>
               <td><center><?php echo ++$no_urut; ?></center></td>
                <td><?php echo $data['iduser'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['password'] ?></td>
              <td> <center>
                <a class="btn btn-sm btn-info" href="edit.php?iduser=<?php echo
                  $data['iduser'] ?>" title="Edit Data" ><span class="fa fa-edit"></span></a>
                  <a class="btn btn-sm btn-danger" href="delete.php?action=hapus&iduser= <?php echo $data['iduser'] ?>" onClick="return confirm(' Data Yakin Mau dihapus ?');" title="Hapus Data" ><span class="fa fa-trash"></span></a>
                </center>
              </td>
            </tr>
            <?php
            $i++;
             $count++;
           }
           ?>
          </tbody>
      </table>
        <center>
          <div><?php echo paginate_one($reload, $page, $tpages); ?></div>
        </center>
    </div>  <!-- /.table-responsive -->
  </div>
</div>
<?php include "../bag_footer.php";?>
<!-- modal input -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          Tambah User Baru
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form action="tambah.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Username</label>
          <input name="username" type="text" class="form-control" placeholder="username" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input name="password" type="text" class="form-control" placeholder="Password" required>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-defatlt" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
