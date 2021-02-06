<?php
// sesuai kan root file mPDF anda
$nama_dokumen='Laporan Permintaan ATK'; //Beri nama file PDF hasil.
define('_MPDF_PATH','config/MPDF60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();

//Tuliskan file HTML di bawah sini , sesuai File anda .
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak
masalah.-->
<!--CONTOH Code START-->
<table border='0' align='LEFT'>
<tr>
<th width="900px">
<h1>  LAPORAN PERMINTAAN ATK  <br> BPJS KESEHATAN CABANG PAYAKUMBUH</h1> </br>

</th>
</tr>
</table>
<hr style="height:3px;" />



<?php

// Koneksi ke database //

error_reporting(0);
include "config/koneksi.php";
include "config/fungsi_indotgl.php";

$tglpermintaanaw = $_POST[tglpermintaanaw];
$tglpermintaanak = $_POST[tglpermintaanak];
?>

<p style="text-align:left;"> Data Dari (Tanggal <?php echo tgl_indo($tglpermintaanaw)?> S/D  <?php echo tgl_indo($tglpermintaanak) ?>) </p>

<table cellspacing="5" cellpadding="5" border="1">
                        
                          <tr>
                            <th>No</th>
                            <th>No Permintaan</th>
                            <th width="25%">Tanggal Permintaan</th>
                            <th width="20%">Nama Produk</th>
                            <th width="20%">Sisa Stok</th>
                            <th>Jumlah Permintaan</th>
                            
                          </tr>
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
                            <td><?php echo "$no"?></td>
                            <td><?php echo "$r[nopermintaan]"?></td>

                            <?php 
                            $tglpermintaan=tgl_indo($r['tglpermintaan']);?>
                            
                            <td align="center"><?php echo "$tglpermintaan"?></td>
                            <td align="center"><?php echo "$r[nama_produk]"?></td>
                            <td align="center"><?php echo "$r[stokproduk]"?></td>
                            <td align="center"><?php echo "$r[itempermintaan]"?></td>
                            </tr>

                        <?php
                        $no++;
                        }
                        ?>

                                                </tbody>
                      </table>
                      
                      <br> <br>
                      <?php 
                      $tanggal =tgl_indo(date('Y-m-d'));
                      ?>
                      <p style="margin: 50px 8px 5px 510px;"> BPJS KESEHATAN<br>PAYAKUMBUH<br> <?php echo "$tanggal"?>
                      <br><br></p>
                     <p style="margin: 50px 8px 5px 510px;"> (...............................)  </p>

<?php
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//$stylesheet = file_get_contents('css/zebra.css');
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>