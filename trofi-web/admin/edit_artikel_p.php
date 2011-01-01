<?php
session_start();
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
if($_POST['submit']){
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $queri = mysql_query("UPDATE halaman set judul='$judul', kategori=$kategori, isi='$isi' WHERE id=$id");
}
header('Location: list.php');