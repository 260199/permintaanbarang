
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb" color="red">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>

          </ol>
        </section>

       <br/>
       <br/>
       <br/>
   
            <body bgcolor="black">
         <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
		<div class="callout callout-danger">
                <marquee><h4>Selamat Datang "<?php echo strtoupper($_SESSION['nama']);?>" DI APLIKASI STOK BARANG ATK</h4></marquee>
             </p>
              </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-12">
                                                <body b0gcolor="black">
                                    <th>Waktu Login Anda </th>
                                <th>:</th>
                                <td><?php date_default_timezone_set("Asia/Jakarta"); echo $date = date(' H:i:s'); ?></td>
                            </tr>  
                                    <h4><u>Permintaan Barang ATK </u> </h4>
                                    <p><b>Hai "<?php echo strtoupper($_SESSION['nama']);?>"Jangan Lupa Untuk :</b></p>
                                    <p style="text-align:justify">

                                      <tr>
                                 <ul>
                                    
                                            
                                            <br>
                                            <li style="text-align:justify">
                                                Check Stok Data Produk Yang Tersedia. <br><font color="blue"><b>"<a href="?pg=produk&amp;act=view"> Data Produk </a>"</b></font>
                                                

                                            </li>
                                            <br>
                                            <li style="text-align:justify">
                                                Check Data Produk Permintaan Pegawai.  <font color="blue" size="3"><b><br>"<a href="?pg=permintaan&amp;act=view"> Tabel Permintaan ATK </a>"</b></font>
                                            </li>
                                           
                                            <br>
                                            <li style="text-align:justify">
                                                Memproses/MengApprove Permintaan Barang ATK Pegawai.<br> <font color="red"><b>"Jangan Lupa Untuk Mempertimbangkan Jumlah Permintaan Barang Maupun Jumlah Pegawai"</b></font>
                                                
                                            </li>
                                            <br>
                                            <li style="text-align:justify">
                                                Jangan Lupa Untuk Membuat Rekap Laporan Harian/Mingguan/Bulanan Data Permintaan Barang ATK.
                                                <br>"<a href="?pg=lappr&amp;act=view" target="blank"> Rekap Laporan </a>"</b></font>

                                            </li>
                                            
                                        </ul>

                                    </p>
                                    <p><b>Penutup :</b></p>
                                    <p>
                                        <font color="blue"><b>Selamat Bekerja  <?php echo strtoupper($_SESSION['nama']);?>.... <br> Patuhi Protokol Kesehatan,Sering-Sering Cuci Tangan Dan Jaga Kesehatan.
                                            <br>
                                            Semoga <?php echo strtoupper($_SESSION['nama']);?> Diberi Kesehatan Selalu. </b></font>

                                    </p>
                                </body>
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->
    </tr>
</p>
</div>
</div>
</div>
</div>
</div>
</div>