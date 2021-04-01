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
  $sql  = "SELECT m.idmobil, m.foto_mobil, j.nama_jenis, m.type_mobil, m.merk, m.no_polisi,
  m.warna, m.harga, m.status   from mobil m,jenis j where m.id_jenis=j.id_jenis and
  m.type_mobil LIKE '%$keyword%' ORDER BY m.idmobil asc";
}else{
    $reload = "index.php?pagination=true";
    $sql = "SELECT m.idmobil, m.foto_mobil, j.nama_jenis, m.type_mobil, m.merk, m.no_polisi,
          m.warna, m.harga, m.status from mobil m,jenis j where m.id_jenis=j.id_jenis
            ORDER BY m.idmobil asc";
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
      <h1 class="page-header">Produk</h1>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-success
          btn-sm"><span class="fa fa-plus"></span> Tambah Produk</button>
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
          placeholder="Search Produk..."   value="
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
                No
              </center>
            </th>
            <th style="width:250px">
              <center>
                Foto Produk
              </center>
            </th>
            <th>
              <center>
                Jenis Produk
                <center>
                </th>
            <th>
              <center>
                Merk Produk
                <center>
                </th>
            <th>
              <center>
                Ukuran
              </center>
            </th>
            <th>
              <center>
                Harga
                <center>
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
                <td align="center"><img src="gambar/<?php echo $data['foto_mobil']
                ?>"
                width="200px" height="150px" /></td>
                <td><?php echo $data['type_mobil'] ?></td>
                <td><?php echo $data['merk'] ?></td>
                <td><?php echo $data['no_polisi'] ?></td>
                <td><?php
                if ($data['status'] == 1){ echo 'Tersedia'; } else { echo 'Tidak Tersedia' ;} ?>
              </td>
              <td> <center>
                <a class="btn btn-sm btn-info" href="edit.php?idmobil=<?php echo
                  $data['idmobil'] ?>" title="Edit Data" ><span class="fa fa-edit"></span></a>
                  <a class="btn btn-sm btn-danger" href="delete.php?action=hapus&idmobil=
                  <?php echo $data['idmobil'] ?>" onClick="return confirm(' Data Yakin Mau
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
          Tambah Mobil Baru
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria
        hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form action="tambah.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Foto</label>
            <input name="foto_mobil" id="gambar" type="file" class="form-control"
            required>
          </div>
          <div class="form-group">
            <label>Jenis Produk</label>
            <select class="form-control" name="nama_jenis" required="required">
              <option value="">Silahkan Pilih</option>
              <?php
              $sql="select * from jenis";
              $jns=$conn->query($sql);
              while($rec=$jns->fetch_array()){
                ?>
                <option value="<?php echo $rec['id_jenis'];
                ?>">
                <?php echo $rec['nama_jenis']
                ?></option>
              <?php
            }   ?>
          </select>
        </div>
        <div class="form-group">
          <label>Merk</label>
          <input name="type_mobil" type="text" class="form-control" placeholder="Nama Mobil .." required>
        </div>
        <div class="form-group">
          <label>Ukuran</label>
          <input name="merk" type="text" class="form-control" placeholder="Merk .."
          required>
        </div>
    
        <div class="form-group">
          <label>Harga</label>
          <input name="harga" type="text" class="form-control"
          placeholder="Harga .." required>
        </div>
        <div class="form-group" hidden>
          <label>Status</label>
          <input name="status" type="text" class="form-control" placeholder="Status .."
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
