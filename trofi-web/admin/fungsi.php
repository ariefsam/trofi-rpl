<?php
$title = "Admin::Trofi-Web";
function get_semua_artikel($halaman, $jumlah=30){
    $mulai = $halaman * $jumlah;
    $queri = mysql_query("SELECT * FROM halaman order by id desc limit $mulai,$jumlah");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}

function get_semua_thread($halaman, $jumlah=30){
    $mulai = $halaman * $jumlah;
    $queri = mysql_query("SELECT * FROM forum_thread order by id desc limit $mulai,$jumlah");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}

function get_forum_konten($thread, $halaman, $jumlah=30){
    $mulai = $halaman * $jumlah;
    $queri = mysql_query("SELECT * FROM forum_content where thread=$thread order by id desc limit $mulai,$jumlah");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}

function get_semua_iklan($halaman, $jumlah=30){
    $mulai = $halaman * $jumlah;
    $queri = mysql_query("SELECT * FROM iklan order by id desc limit $mulai,$jumlah");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}

function get_semua_user($halaman, $jumlah=30){
    $mulai = $halaman * $jumlah;
    $queri = mysql_query("SELECT * FROM member order by id desc limit $mulai,$jumlah");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}

function get_user($id){
    $queri = mysql_query("SELECT * FROM member WHERE id=$id");
    return mysql_fetch_array($queri);
}

function get_semua_kategori(){
    $queri = mysql_query("select * from kategori");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}
function loginkah(){
    if ($_SESSION['admin']) return true;
    else return false;
}
function login($username,$password){
    $password = md5($password);
    $queri = mysql_query("SELECT * FROM admin where username='$username' and password='$password'");
    $q = mysql_fetch_array($queri);
    if($queri){
        $_SESSION['admin'] = $q['username'];
        return true;
    }
    else return false;
}
function logout(){
    session_destroy();
}

function get_kategori($id){
       $q = mysql_fetch_array(mysql_query("SELECT * FROM kategori where id=$id"));
       return $q[1];
}

function UploadImage($fupload_name){
  //direktori gambar
  $vdir_upload = "../pictures/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
//
//  //identitas file asli
//  $im_src = imagecreatefromjpeg($vfile_upload);
//  $src_width = imageSX($im_src);
//  $src_height = imageSY($im_src);
//
//  //Simpan dalam versi small 110 pixel
//  //Set ukuran gambar hasil perubahan
//  $dst_width = 55;
//  $dst_height = ($dst_width/$src_width)*$src_height;
//
//  //proses perubahan ukuran
//  $im = imagecreatetruecolor($dst_width,$dst_height);
//  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
//
//  //Simpan gambar
//  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
//
//  //Hapus gambar di memori komputer
//  imagedestroy($im_src);
//  imagedestroy($im);
}