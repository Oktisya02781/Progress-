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
  $sql  = "SELECT p.id_pelanggan, p.no_ktp, p.foto_pelanggan, p.nama_lengkap, p.tanggal_lahir, p.alamat_pelanggan, p.no_telepon, p.status_peminjaman from pelanggan p where p.id_pelanggan=p.id_pelanggan and
  p.nama_lengkap LIKE '%$keyword%' ORDER BY p.id_pelanggan asc";
}else{
    $reload = "index.php?pagination=true";
    $sql = "SELECT p.id_pelanggan, p.no_ktp, p.foto_pelanggan, p.nama_lengkap, p.tanggal_lahir, p.alamat_pelanggan, p.no_telepon, p.status_peminjaman from pelanggan p where p.id_pelanggan=p.id_pelanggan
             ORDER BY p.id_pelanggan asc";
      }
    $hasil=$conn->query($sql);


 $rpp   = 5; // jumlah record per halaman
    if (isset($_GET["page"]))
        $page = intval($_GET["page"]);
    else
        $page=0;

    if($page<=0)
        $page = 1;
        $tcount  = $hasil->num_rows;
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count= 0;
        $i  = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
?>
<div class="col-sm-9">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h1 class="page-header">Pelanggan</h1>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-success
          btn-sm"><span class="fa fa-plus"></span> Tambah Data Pelanggan</button>
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
        <div class="form-group input-group">
          <input type="text" name="keyword" class="form-control"
          placeholder="Search Nama...."   value="
          <?php if(isset($_REQUEST["keyword"]))
          echo $_REQUEST["keyword"]; ?>  ">
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
                no
              </center>
            </th>
            <th>
              <center>
                id
              </center>
            </th>
            <th>
              <center>
                no_ktp
              </center>
            </th>
            <th style="width:250px">
              <center>
               Foto
                <center>
                </th>
            <th>
              <center>
                Nama
                <center>
                </th>
            <th>
              <center>
               tanggal lahir
              </center>
            </th>
            <th>
              <center>
                Alamat
                <center>
                </th>
            <th>
              <center>
                No telepon
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
                <td><?php echo $data["id_pelanggan"] ?></td>
                <td><?php echo $data["no_ktp"] ?></td>
                <td align="center"><img src="gambar/<?php echo $data["foto_pelanggan"]
                ?>"
                width="200px" height="150px" /></td>
                <td><?php echo $data["nama_lengkap"] ?></td>
                <td><?php echo $data["tanggal_lahir"] ?></td>
                 <td><?php echo $data["alamat_pelanggan"] ?></td>
                  <td><?php echo $data["no_telepon"] ?></td>
              <td> <center>
                <a class="btn btn-sm btn-info" href="edit.php?id_pelanggan=<?php echo
                  $data['id_pelanggan'] ?>" title="Edit Data" ><span class="fa fa-edit"></span></a>
                  <a class="btn btn-sm btn-danger" href="delete.php?action=hapus&id_pelanggan=
                  <?php echo $data['id_pelanggan'] ?>" onClick="return confirm('Data Yakin Mau
                  dihapus ?');" title="Hapus Data" ><span class="fa fa-trash"></span></a>
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
          Tambah Pelanggan
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria
        hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form action="tambah.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>ID</label>
            <input name="id_pelanggan"  type="text" class="form-control"
            required>
          </div>
          <div class="form-group">
            <label>NO KTP</label>
            <input name="no_ktp"  type="text" class="form-control"
            required>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input name="foto_pelanggan" id="gambar" type="file" class="form-control"
            required>
          </div>
        <div class="form-group">
          <label>Nama</label>
          <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama lengkap .." required>
        </div>
        <div class="form-group">
          <label>tanggal lahir</label>
          <input name="tanggal_lahir" type="text" class="form-control" placeholder="tanggal lahir .."
          required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input name="alamat_pelanggan" type="text" class="form-control"
          placeholder="Alamat .." required>
        </div>
        <div class="form-group">
          <label>NO telepon</label>
          <input name="no_telepon" type="text" class="form-control"
          placeholder="nomor .." required>
        </div>
        <div class="form-group" hidden>
          <label>Status</label>
          <input name="status_peminjaman" type="text" class="form-control" placeholder="Status .."
          value="1" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-
            dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>