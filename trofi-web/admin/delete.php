<?php
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
$id = $_GET['del'];
require "../class/artikel.php";
$artikel = new artikel($id);
unlink("../pictures/" . $artikel->gambar);
if ($id) $queri = mysql_query("DELETE FROM halaman WHERE id=$id");
