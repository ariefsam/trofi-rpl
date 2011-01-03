<?php
$halaman->header->activeMenu = "artikel";
$halaman->konten->isi[0] = new html("<h2>Artikel</h2>");
    $halaman->slider = new html("<div>&nbsp;</div>");
    $halaman->header->style_body = "background-image: url(images/headers.jpg)";
    if(!$_GET['id']){
        if(!$_GET['hal']) $hal = 0;
        else $hal = $_GET['hal']-1;
        $jumlah_per_halaman=5;
        if($_GET['kategori']){
            $queri = mysql_query("SELECT id FROM halaman where kategori = " . $_GET['kategori'] . " ORDER by id desc limit $hal,$jumlah_per_halaman");
            $total = mysql_fetch_array(mysql_query("SELECT count(id) from halaman where kategori = " . $_GET['kategori']));
        }
        else { $queri = mysql_query("SELECT id FROM halaman ORDER by id desc limit $hal,$jumlah_per_halaman");
            $total = mysql_fetch_array(mysql_query("SELECT count(id) from halaman"));
        }
        $i = 1;        
        $total = $total[0];
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
        $link = "?h=artikel";
        if($_GET['kategori']) $link .= "&kategori=" . $_GET['kategori'];
        $halaman->konten->isi[$i] = new pagination(++$hal,$total,$jumlah_per_halaman,$link, "hal");

    }
    else{
        $artikel = new artikel($_GET['id']);
        $halaman->header->judul = $artikel->judul . " .::.- Trofi-Webs";
        $halaman->konten->isi[0] = $artikel;
    }
?>
