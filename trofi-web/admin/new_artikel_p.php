<?php
session_start();
require "../dbconfig.php";
require "fungsi.php";
if(!loginkah()) header("Location: login.php");
$lokasi_file    = $_FILES['fupload']['tmp_name'];
$tipe_file      = $_FILES['fupload']['type'];
$nama_file      = $_FILES['fupload']['name'];
$acak           = time();
$nama_file_unik = $acak.$nama_file;
// Apabila ada gambar yang diupload
if (!empty($lokasi_file)){
UploadImage($nama_file_unik);

mysql_query("INSERT INTO halaman(judul,
                                kategori,
                                isi,
                                gambar,
                                resume_gambar, tanggal)
                        VALUES('$_POST[judul]',
                               '$_POST[kategori]',
                               '$_POST[isi]',
                               '$nama_file_unik',
                               '$_POST[resume_gambar]', now());");
}
else{
mysql_query("INSERT INTO halaman(judul,kategori,isi,resume_gambar)
            VALUES('$_POST[judul]','$_POST[kategori]','$_POST[isi]','$_POST[resume_gambar]');");
}
header('Location: list.php');
