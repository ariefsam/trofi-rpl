<?php
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
$id     = $_GET['id'];
$nama   = $_POST['nama'];
$alamat = $_POST['alamat'];
$email  = $_POST['email'];
$no_hp  = $_POST['no_hp'];
if ($id) $queri = mysql_query("UPDATE member set nama='$nama', alamat='$alamat', email='$email', no_hp = '$no_hp' where id=$id");
header("Location: user.php");
