<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA Permintaan //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Permintaan ATK </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=permintaan&act=view">Data Permintaan</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box-header">
    <a href="?pg=permintaan&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Peminta</th>
                        <th>Tanggal Permintaan</th>
                        <th>Nama Produk</th>
                        <th>Jenis Produk</th>
                        <th>Banyak Permintaan</th>                        
                        <th>Sisa Stok</th>
    
                        <th>Status Permintaan</th>
                        <th>Data Produk</th>
                        <th> Delet</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM permintaan r join produk p 
                    on (p.id_produk=r.id_produk)  order by nopermintaan asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
						 
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        <td><?php echo "$r[namapeminta]"?></td>

                        <?php 
                        $tglpermintaan=tgl_indo($r['tglpermintaan']);?>
                        
                        <td><?php echo "$tglpermintaan"?></td>
                        <td><?php echo "$r[nama_produk]"?></td>
                        <td><?php echo "$r[jenis]"?></td>
                        <td><?php echo "$r[itempermintaan]"?> <?php echo "$r[satuan]"?> </td>
                        <td><?php echo "$r[stokproduk]"?></td>
                        
                     
                        <td>
							<?php
							// echo 'sss' . $f['status'];
							if ($r['status'] == 0) {?>
								<a href="?pg=permintaan&act=terima&id=<?php echo $r['nopermintaan']?>">
<button type="button" class="btn btn-success"  onclick="return confirm('Apakah anda yakin akan Setuju Dengan Permintaan?');">Accept</i></button></a>
							<?php 
              if ($r['status'] == 1)
                ;}else{
                  echo "Telah Di Setujui";
                } ?>
						  
						 </td>
               <td>
              <?php
              // echo 'sss' . $f['status'];
              if ($r['status'] == 0) {?>
                <button disabled="" ="disabled" class="fa fa-edit-o");"><i class = "fa fa-edit-o"></i>Diproses</button></a>

              <?php 
              if ($r['status'] == 1)
                ;}else{
                  echo "Produk Telah Keluar";
                } ?>
              
             </td>

                        <td><a href="?pg=permintaan&act=delete&id=<?php echo $r['nopermintaan']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>
                        </tr>

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
      // PROSES TAMBAH DATA REALISASI //
      case 'add':
      if (isset($_POST['add'])) {

        $ambilProduk = mysql_fetch_array(mysql_query("select * from produk where id_produk = '$_POST[id_produk]'"));
        $sisaStok = $ambilProduk[stokproduk] ;
        

        if ($_POST[itempermintaan] > $ambilProduk[stokproduk]){
          echo "<SCRIPT language=Javascript>
          alert('Maaf Stok Produk yang tersedia tidak mencukupi, Silahkan Ulangi Pengisian Form Produk')
          </script>
          <script>window.location='?pg=permintaan&act=add'</script>";
        } else {

                $query = mysql_query("INSERT INTO permintaan VALUES ('$_POST[nopermintaan]',
                '$_POST[tglpermintaan]','$_POST[id_produk]',
                '$_POST[itempermintaan]','$_POST[namapeminta]','$status')");

                mysql_query("update produk set stokproduk = '$sisaStok'
                             where id_produk = '$_POST[id_produk]'");
                echo "<script>window.alert('Data Berhasil Di Simpan')
        window.location='?pg=permintaan&act=view'</script>";
              }
            }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Permintaan ATK</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=permintaan&act=view">Data Permintaan</a></li>
            <li class="active"><a href="#">Tambah Data Permintaan</a></li>
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
                      <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from permintaan");
                      
                      $num = mysql_num_rows($sql);
                      
                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 4, "0", STR_PAD_LEFT);
                      $tahun = date('Ym');
                      $kode_jadi = "BPJS$tahun$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">Nomor Permintaan</label>
                      <input type="text" class="form-control" id="nopermintaan" name="nopermintaan" placeholder="Nomor Permintaan" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="nopermintaan" name="nopermintaan" placeholder="Nomor Permintaan" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Permintaan</label>
                      <input class="form-control" id="date" name="tglpermintaan" placeholder="MM/DD/YYY" type="text"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label> <br>
                      <select class="form-control select2" name="id_produk">
                      <option value="">--- Silahkan Pilih ---</option>
                      <optgroup label="--- Nama Produk ---">
                      <?php
                      $tampil=mysql_query("SELECT * FROM produk ORDER BY id_produk");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['id_produk']?>"><?php echo $r['nama_produk'] ?></option>
                      <?php
                    }
                    ?>
                    </optgroup>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Banyak Permintaan</label>
                      <input type="number" class="form-control" id="itempermintaan" name="itempermintaan" placeholder="Jumlah Permintaan" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Peminta</label>
                      <input type="text" class="form-control" id="namapeminta" name="namapeminta" placeholder="Nama " required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name ='add' class="btn btn-info">Simpan</button>
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
      
    // PROSES TERIMA DATA //
      case 'terima':
      // $ambilProduk = mysql_fetch_array(mysql_query("select * from permintaan r
        // join produk p on (r.id_produk=p.id_produk) where nopermintaan='$_GET[id]'"));
		
	$ambilProduk = mysql_fetch_array(mysql_query("select * from permintaan where nopermintaan='$_GET[id]'"));
	$produk = mysql_fetch_array(mysql_query("select * from produk where id_produk=$ambilProduk[id_produk]"));
	
      $stokproduk =  $produk['stokproduk'] - $ambilProduk['itempermintaan'] ;
	
	$sql = "update produk set stokproduk = $stokproduk
                    where id_produk = $ambilProduk[id_produk]";
      mysql_query($sql);
		
		$sql_status = "update permintaan SET status = 1 WHERE nopermintaan='$_GET[id]'";
      mysql_query($sql_status);
	  
      echo "<script>window.location='?pg=permintaan&act=view'</script>";
      break;




      break;
      
    // PROSES HAPUS DATA REALISASI //
      case 'delete':
      $ambilProduk = mysql_fetch_array(mysql_query("select * from permintaan r
        join produk p on (r.id_produk=p.id_produk) where nopermintaan='$_GET[id]'"));

      $stokproduk = $ambilProduk[stokproduk];

      mysql_query("update produk set stokproduk = '$stokproduk'
                    where id_produk = '$ambilProduk[id_produk]'");

      mysql_query("DELETE FROM permintaan WHERE nopermintaan='$_GET[id]'");
      echo "<script>window.location='?pg=permintaan&act=view'</script>";
      break;

    }
    ?>
    