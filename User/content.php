<?php 
/**
 * Aplikasi Insentif
 * 
 * 
 * 
 * @author B.E.
 */
if (!isset($_GET['pg'])) {
	include 'dashboard.php';
} else {
	switch ($_GET['pg']) {
		case 'dashboard':
			include 'dashboard.php';
			break;
    	case 'admin':
			include 'admin.php';
			break;
		case 'produk':
			include 'produk.php';
			break;
		case 'permintaan':
			include 'permintaan.php';
			break;
			case 'lappr':
			include 'lap_permintaan.php';
			break;
		case 'cetak':
			include 'cetak_pdf.php';
			break;
		
			
		default:	        
	    	echo "<label>404 Halaman tidak ditemukan</label>";
	    break;
		
	}
}

?>