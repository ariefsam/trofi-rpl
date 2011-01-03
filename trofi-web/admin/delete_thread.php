<?php
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
$id = $_GET['del'];
if ($id) $queri = mysql_query("DELETE FROM forum_thread WHERE id=$id");
if($queri) mysql_query("DELETE FROM forum_content WHERE thread=$id");
