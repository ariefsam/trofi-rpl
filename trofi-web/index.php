<?php
session_start();
require "dbconfig.php";
require "class.php";

$halaman = new halaman();
$halaman->konten->isi[0] = new html("<h2>welcome</h2>");
if (!$_GET['h']){
    $halaman->header->style_body = "background-image: url('images/headers.jpg')";
    $halaman->slider = new html("$nbsp;");
    require "halaman/home.php";
}
else if ($_GET['h']=="artikel"){
    require "halaman/artikel.php";
}
else if ($_GET['h']=="registrasi"){
    require "halaman/registrasi.php";
}
else if ($_GET['h']=="isiartikel"){
    if ($_POST['kategori']){
        $judul=$_POST['judul'];
        $kategori=$_POST['kategori'];
        $isi=$_POST['isi'];
        $gambar=$_POST['gambar'];
        $deskripsi=$_POST['deskripsi'];

        $query=mysql_query("insert into halaman(judul,kategori,isi,gambar,resume_gambar) values ('$judul','$kategori','$isi','$gambar','$deskripsi')");
        header("Location: ./");

    }
    else{
        $halaman->konten->isi[0]=new isiArtikel();
    }
}
else if ($_GET['h']=="member"){
    $halaman->header->activeMenu = "member";
    if($_SESSION['id_member']) $halaman->konten->isi[0] = new member_area('id', $_SESSION['id_member']);
    else header("Location: ?h=login");
}
else if ($_GET['h']=="login"){
    $halaman->header->activeMenu = "member";
    if ($_SESSION['id_member']) header("Location: ?h=member");
    else $halaman->konten->isi[0] = new login();
}
else if ($_GET['h']=="logout"){
    $halaman->header->activeMenu = "member";
    session_destroy();
    header("Location: ./");
}
else if ($_GET['h']=="logp"){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $q = mysql_fetch_array(mysql_query("SELECT count(id),id from member WHERE email='$email' and password='$password'"));
    if($q[0]>0){
        $_SESSION['id_member'] = $q['id'];
        header("Location: ?h=member");
    }
}
else if($_GET['h']=="tambah_iklan"){
    $halaman->header->activeMenu = "iklan";
    $halaman->konten->isi[0]=new tambah_iklan();
}
else if($_GET['h']=="iklanp"){
    $judul=$_POST['judul'];
    $isi=$_POST['isi'];
    $id_member = $_SESSION['id_member'];
    $query=mysql_query("INSERT INTO iklan(member,judul,isi,tanggal) VALUES ($id_member,'$judul','$isi',now())");
    header("Location: ?h=member");
}
else if($_GET['h']=="iklan"){
    $halaman->konten->isi[0] = new tampilkan_iklan();
    $halaman->header->activeMenu = "iklan";
}
else if($_GET['h']=="forum"){
    $halaman->header->activeMenu = "forum";
    $forum = new forum();
    if($_GET['s']=="b"){        
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $member = $_SESSION['id_member'];
        $forum->buat_thread($judul,$isi,$member);
    }
    else if($_GET['s']=='t'){
        $halaman->konten->isi[0] = new thread($_GET['id']);
    }
    else if($_GET['s']=="fb"){
        $halaman->konten->isi[0] = new tampilan_forum("buat");
    }
    else if($_GET['s']=="r"){
        $id=$_GET['id'];
        $forum->reply($_POST['balas'], $_GET['id'], $_SESSION['id_member']);
        header("Location: ./?h=forum&s=t&id=$id");
    }
    else
    $halaman->konten->isi[0] = new tampilan_forum();
}
else if($_GET['h']=="hpsiklan"){
    $iklan = new iklan($_GET['id']);
    $iklan->hapus();
    header("Location: ?h=member");
}
else if($_GET['h']=="editiklan"){
    if($_POST['judul']){
       $iklan = new iklan($_POST['id']);
       $iklan->edit($_POST['judul'], $_POST['isi']);
	   header("Location: ?h=member");
    }
    else {
    $iklan = new edit_iklan($_GET['id']);
    $halaman->konten->isi[0] = $iklan;
    }
}
else if($_GET['h']=="faq"){
    $halaman->konten->isi[0]=new faq();
    $halaman->header->activeMenu="FAQ";
}
else if ($_GET['h']=="kebijakan_privasi"){
    $halaman->konten->isi[0] = new kebijakan_privasi();
    $halaman->header->activeMenu = "FAQ";
}
$halaman->tampilkan();
?>
