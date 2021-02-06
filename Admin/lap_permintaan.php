<?php
switch ($_GET['act']) {
      
  // PROSES VIEW DATA LAPORAN PERMINTAAN //      
      
   case 'view':
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Laporan Permintaan ATK</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li><a href="?pg=lappr&act=view"><i class="fa fa-dashboard"></i> Laporan Permintaan ATK</a></li>
             </ol>
        </section>

<section class="content">
  <div class="row">
  <div class="col-md-5">
  <form action="?pg=lappr&act=cek" method="POST">
      <div class="form-group">
      <label for="exampleInputEmail1">Tanggal Permintaan Awal</label>
      <input class="form-control" id="date" name="tglpermintaanaw" placeholder="MM/DD/YYY" type="text" required/>
      </div>
  </div>
  <div class="col-md-5">
      <div class="form-group">
      <label for="exampleInputEmail1">Tanggal Permintaan Akhir</label>
      <input class="form-control" id="date" name="tglpermintaanak" placeholder="MM/DD/YYY" type="text" required/>
      </div>
  </div>
  
  <div class="col-md-2">
      <div class="form-group">
      <label for="exampleInputEmail1">Mulai Pencarian</label><br>
      <input type="submit" value="Pencarian" class="btn btn-info">
      </div>
  </div>
  </form>

  <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-hover table-bordered">
                      <thead>
                      <tr>
                        <center>
                        <th>No</th>
                        <th>No Permintaan</th>
                        <th>Tanggal Permintaan</th>
                        <th>Nama Produk</th>
                        <th>Sisa Stok</th>
                        <th>Jumlah Item Permintaan</th>
                        </center>
                      </tr>
                    </thead>
                    <tbody>
                    
                                       </tbody>
                  </table>
                  </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
</div><!-- /.container -->
</div><!-- /.content-wrapper -->

<?php
break;

  case 'cek':
  // menampilkan pertanyaan pertama
  $sqlp = "SELECT * FROM permintaan r
          JOIN produk p ON ( r.id_produk = p.id_produk) where
          tglpermintaan BETWEEN  '$_POST[tglpermintaanaw]' AND  '$_POST[tglpermintaanak]'
          ORDER BY nopermintaan ASC";

  $rs=mysql_query($sqlp);
  $data=mysql_fetch_array($rs);

  if (!(empty($data))){
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Laporan Permintaan ATK</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li><a href="?pg=lappr&act=view"><i class="fa fa-dashboard"></i> Laporan Permintaan</a></li>
             </ol>
        </section>

    <section class="content">
      <div class="row">
      <div class="col-md-5">
      <form action="?pg=lappr&act=cek" method="POST">
          <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Permintaan Awal</label>
          <input class="form-control" id="date" name="tglpermintaanaw" placeholder="MM/DD/YYY" type="text" required/>
          </div>
      </div>
      <div class="col-md-5">
          <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Permintaan Akhir</label>
          <input class="form-control" id="date" name="tglpermintaanak" placeholder="MM/DD/YYY" type="text" required/>
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
          <label for="exampleInputEmail1">Mulai Pencarian</label><br>
          <input type="submit" value="Pencarian" class="btn bg-orange">
          </div>
      </div>
      </form>

      <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" rules="cols" class="table table-hover table-bordered">
                        <thead>
                          <tr><center>
                            <th>No</th>
                            <th>No Permintaan</th>
                            <th>Tanggal Permintaan</th>
                            <th>Nama Produk</th>
                            <th>Sisa Stok</th>
                            <th>Jumlah Item Permintaan</th>
                            
                          </center></tr>
                        </thead>
                        <tbody>
                        <?php
                        $tampil=mysql_query("SELECT * FROM permintaan r
                        JOIN produk p ON ( r.id_produk = p.id_produk) where
                        tglpermintaan BETWEEN  '$_POST[tglpermintaanaw]' AND  '$_POST[tglpermintaanak]'
                        ORDER BY nopermintaan ASC");
                        $no = 1;
                          while ($r=mysql_fetch_array($tampil)){
                        ?>
                            <tr>
                            <center><td><?php echo "$no"?></td>
                            <td><?php echo "$r[nopermintaan]"?></td>

                            <?php 
                            $tglpermintaan=tgl_indo($r['tglpermintaan']);?>
                            
                            <td><?php echo "$tglpermintaan"?></center></td>
                            <td><?php echo "$r[nama_produk]"?></td>
                            <td><?php echo "$r[stokproduk]"?></td>
                            <td><?php echo "$r[itempermintaan]"?></td>
                            
                            </tr>

                        <?php
                        $no++;
                        }
                        ?>

                        
                        
						
               </tr>
                        </tbody>
                      </table>
                      </div><!-- /.box-body -->
                  </div>
                  </div><!-- /.box -->
                  </div> <!-- /.col -->
      </div>
        <!-- /.row (main row) -->

      <div class="row">
              <div class="col-md-4 col-md-offset-8">
              <form role="form" action="cetak_pdf.php" method="POST" target="blank">
              <div class="box-body">
                  <div class="form-group">
                  <button type="submit" class="btn btn-danger">
                  <i class="fa fa-file-pdf-o">   Simpan ke PDF</i>  
                  </button>
                  </div>
                  <div class="form-group">
                  <input type="hidden" class="form-control" id="tglpermintaanaw" name="tglpermintaanaw" placeholder="mm" value= "<?php echo $_POST['tglpermintaanaw']?>">
                  <input type="hidden" class="form-control" id="tglpermintaanak" name="tglpermintaanak" placeholder="mm" value= "<?php echo $_POST['tglpermintaanak']?>">
                  </div>
              </form>
          </div>
          </div>
          </div>

    </section> <!-- /.content -->
    </div><!-- /.container -->
    </div><!-- /.content-wrapper -->

<?php
} else { 
  ?>
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1> Silahkan pilih</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="?pg=lappr&act=view"><i class="fa fa-dashboard"></i> laporan Permintaan ATK</a></li>
             </ol>
      </section>

      <section class="content">
          <div class="box box-success">
              <div class="box-body">
                  <div class="form-group">
                  <?php
                  echo " <p> Maaf untuk pencarian yang anda cari tidak tersedia. <br>
                  Silahkan coba lakukan pencarian ulang. Terima Kasih </p>";
                  
                  ?>
                  </div>
              </div>
          </div>
      </section> <!-- /.content -->
    </div> <!-- /.container -->
  </div> <!-- /.content-wrapper -->

  <?php
  }
  ?>

<?php
break;
}
?>