<?php
require "class.php";
require "dbconfig.php";
/*
$halaman = new halaman();
$tampilkan = $halaman->tampilkan();
*/
if (!$_GET['h']){
    require "admin/produk.php";
}


?>
