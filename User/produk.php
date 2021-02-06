<?php
error_reporting
?>

<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA PRODUK //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Produk ATK </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Barang ATK  
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box-header">
    <a href="?pg=produk&act=add"> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jenis Produk</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Tgl Pemasukan</th>
                        
                      </tr>
                    </thead>
          
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM produk order by id_produk asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        <td><?php echo "$r[nama_produk]"?></td>
                        <td><?php echo "$r[jenis]"?></td>
                        <td><?php echo "$r[stokproduk]"?></td>
                        <td><?php echo "$r[satuan]"?></td>
                        <td><?php echo "$r[tglmasuk]"?></td>
                        
            <?php
                    $no++;
                    }
                    ?>
          
      
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
      // PROSES TAMBAH DATA PRODUK //
      case 'add':
//proses
    if(isset($_POST['add'])) {
    $nama_produk=$_POST['nama_produk'];
    $jenis=$_POST['jenis'];
    $stokproduk=$_POST['stokproduk'];
    $satuan=$_POST['satuan'];
    $tglmasuk=$_POST['tglmasuk'];
   
//script validasi data
 
    $cek = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE 
  kode_produk='$kode_produk'"));
    if ($cek > 0){
    echo "<script>window.alert('Nama Barang yang anda masukan sudah ada')
    window.location='?pg=produk&act=view'</script>";
    }else {
    $query = mysql_query("INSERT INTO produk VALUES ('','$_POST[nama_produk]',
                '$_POST[jenis]','$_POST[stokproduk]','$_POST[satuan]','$_POST[tglmasuk]')");
                
    echo "<script>window.alert('Data Berhasil DI Simpan')
    window.location='?pg=produk&act=view'</script>";
    }
    }
    ?>

<

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Produk</label>
                      <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Produk" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Stok Produk</label>
                      <input type="number" class="form-control" id="stokproduk" name="stokproduk" placeholder="Stok Produk" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
           <div class="form-group">
                      <label for="exampleInputEmail1">Satuan</label>
                      <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
           <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Pemasukan</label>
                      <input class="form-control" id="date" name="tglmasuk" placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
                    </div>
                    
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'"));
            if (isset($_POST['update'])) {

                mysql_query("UPDATE produk SET nama_produk='$_POST[nama_produk]',
                  jenis='$_POST[jenis]',stokproduk='$_POST[stokproduk]',satuan='$_POST[satuan]',tglmasuk='$_POST[tglmasuk]' WHERE id_produk='$_POST[id]'");
                echo "<script>window.location='?pg=produk&act=view'</script>";
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Pengguna </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Produk</a></li>
            <li class="active">Update Data Produk</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" 
            required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_produk'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Produk</label>
                      <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Produk Produk" value= "<?php echo $d['jenis'];?>">
                      <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_produk'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Stok Produk</label>
                      <input type="number" class="form-control" id="stokproduk" name="stokproduk" placeholder="Stok Produk" value= "<?php echo $d['stokproduk'];?>">
                    </div>
           <div class="form-group">
                      <label for="exampleInputEmail1">Satuan</label>
                      <input type="text" class="form-control" id="satuan" name="satuan" placeholder="satuan" 
            required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['satuan'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Pemasukan</label>
                      <input type="text" class="form-control" id="date" name="tglmasuk" placeholder="MM/DD/YYY"  value= "<?php echo $d['tglmasuk'];?>">
                    </div>
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Update</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
      echo "<script>window.location='?pg=produk&act=view'</script>";
      break;

    }
    ?>