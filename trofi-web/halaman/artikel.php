<?php
$halaman->header->activeMenu = "artikel";
$halaman->konten->isi[0] = new html("<h2>Artikel</h2>");
    $halaman->slider = new html("<div>&nbsp;</div>");
    $halaman->header->style_body = "background-image: url(images/headers.jpg)";
    if(!$_GET['id']){
        if($_GET['kategori']){
            $queri = mysql_query("SELECT id FROM halaman where kategori = " . $_GET['kategori']);
        }
        else $queri = mysql_query("SELECT id FROM halaman");
        $i = 1;
        while ($q = mysql_fetch_array($queri)){
            $artikel = new artikel($q[0]);
            $u = new UnderContent();
            $u->judul = $artikel->judul;
            $u->gambar = $artikel->gambar;
            $u->isi = substr($artikel->isi, 0, 500);
            $u->id = $artikel->id;
            $halaman->konten->isi[$i] = $u;
            $i++;
        }

    }
    else{
        $artikel = new artikel($_GET['id']);
        $halaman->header->judul = $artikel->judul . " .::.- Trofi-Webs";
        $halaman->konten->isi[0] = $artikel;
    }
?>
