<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

       <br/>
       <br/>
       <br/>
   






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
                                	<th>Waktu Login Anda </th>
                                <th>:</th>
                                <td><?php date_default_timezone_set("Asia/Jakarta"); echo $date = date(' H:i:s'); ?></td>
                            </tr>  
                                    <h4><u>Permintaan Barang ATK </u> </h4>
                                    <p><b>Hai. Sebelum Kamu Meminta Barang ATK. Kami Harap Kamu Mau Mengikuti Langkah-Langkah Berikut Ini :</b></p>
                                    <p style="text-align:justify">

                                      <tr>
                                 <ul>
                                 	
                                            
                                            <br>
                                            <li style="text-align:justify">
                                            	Pastikan Check Terlebih Dahulu Data Produk ATK Yang Tersedia Untuk Permintaan Produk,Apakah Stoknya Ada Atau Tidak.
                                            	Anda Bisa Menchecknya Di : <br><font color="blue"><b><a href="?pg=produk&amp;act=view"> Data Produk </a>"</b></font>
                                                

                                            </li>
                                            <br>
                                            <li style="text-align:justify">
                                                Setelah Di Check Silahkan Buat Data Permintaan Barang Anda Di  <font color="blue" size="3"><b><br>"<a href="?pg=permintaan&amp;act=view"> Tabel Permintaan ATK </a>"</b></font>
                                            </li>
                                           
                                            <br>
                                            <li style="text-align:justify">
                                                Pastikan Form Data Permintaan Anda Sudah Betul Dan Statusnya Nanti Akan Keluar ( Diproses ) Maka Anda Menunggu Untuk Pihak Admin Untuk Memproses.<br> <font color="red"><b>"Diharapkan Setelah Meinputkan Data Permintaan ATK Agar Segera Menghubungi Pihak Admin Permintaan Barang ATK Dengan Memberitahukan Nomor Permintaan Anda VIA Telegram :"</b></font>
                                                <ul>
                                                	<br>
                                                <li> Indra Jaya <font color="blue"><b>" <a href="https://t.me/Berjayalah" target="blank"> Telegram "</a></b></font></li> 
                                                <li> Wellyngthon Oktavianus Sijabat
 <font color="blue"><b>" <a href="https://t.me/Wellyngthon" target="blank"> Telegram "</a></b></font></li> 
                                                
                                                 
                                                <li> Rahmat Kurniawan
 <font color="blue"><b>" <a href="https://t.me/rmt_kurniawan" target="blank"> Telegram "</a></b></font></li> 
                                            </li>
                                            </li>
                                        </ul>
                                            <br>
                                            <li style="text-align:justify">
                                                Setelah Anda Melapor Ke Admin. Maka Permintaan Anda Akan Segera Di Proses.
                                            </li>
                                            
                                        </ul>

                                    </p>
                                    <p><b>Penutup :</b></p>
                                    <p>
                                        <font color="blue"><b>Terimakasih atas waktunya.... Semoga Bapak/Ibu ..........sehat selalu.... </b></font>
                                    </p>
                                    <p> <font color="blue"><b> Dimohon Kerja Sama Bapak/Ibu Untuk Mengikuti Tata Cara Permintaan Barang Diatas</b></font></p>
                                    <p>
                                        <font color="blue"><b>Selamat Bekerja  <?php echo strtoupper($_SESSION['nama']);?>.... <br> Patuhi Protokol Kesehatan,Sering-Sering Cuci Tangan Dan Jaga Kesehatan.
                                            <br>
                                            Semoga <?php echo strtoupper($_SESSION['nama']);?> Diberi Kesehatan Selalu. </b></font>

                                    </p>

                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->