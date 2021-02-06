<?php

define('DBHOST', 'sql108.epizy.com');
define('DBUSER', 'epiz_27214705');
define('DBPASS', 'mReILwdVoP');
define('DBNAME', 'epiz_27214705_stok_bpjs');

/**
 * $dbconnect : koneksi kedatabase
 */
$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
	die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}
