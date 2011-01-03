<?php
session_start();
require '../dbconfig.php';
require 'fungsi_thumb.php';

$module=$_GET[module];
$act=$_GET[act];

// Hapus produk
if ($module=='halaman' AND $act=='hapus'){
  mysql_query("DELETE FROM halaman WHERE id='$_GET[id]'");
  header('location:index.php');
}

// Input produk
elseif ($module=='halaman' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = time();
  $nama_file_unik = $acak.$nama_file; 
  echo $nama_file_unik;
  // Apabila ada gambar yang diupload
//  if (!empty($lokasi_file)){
//    UploadImage($nama_file_unik);
//
//    mysql_query("INSERT INTO halaman(judul,
//                                    kategori,
//                                    isi,
//                                    gambar,
//                                    resume_gambar)
//                            VALUES('$_POST[judul]',
//                                   '$_POST[kategori]',
//                                   '$_POST[isi]',
//                                   '$nama_file_unik',
//                                   '$_POST[resume_gambar]');");
//  }
//  else{
//    mysql_query("INSERT INTO halaman(judul,kategori,isi,resume_gambar)
//                VALUES('$_POST[judul]','$_POST[kategori]','$_POST[isi]','$_POST[resume_gambar]');");
//  }
//  header('location:index.php');
}

// Update produk
elseif ($module=='halaman' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE halaman SET judul = '$_POST[judul]',
                                   kategori = '$_POST[kategori]',
                                   isi = '$_POST[isi]',
                                   resume_gambar = '$_POST[resume_gambar]'
                             WHERE id   = '$_POST[id]'");
  }
  else{
    UploadImage($nama_file_unik);
    mysql_query("UPDATE halaman SET judul = '$_POST[judul]',
                                   kategori = '$_POST[kategori]',
                                   isi = '$_POST[isi]',
                                   resume_gambar = '$_POST[resume_gambar]',
                                   gambar      = '$nama_file_unik'
                             WHERE id   = '$_POST[id]'");
  }
  header('location:index.php');
}
?>
