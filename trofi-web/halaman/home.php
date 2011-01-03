<?php
    $tes = mysql_query("select * from halaman order by id desc");
    $halaman->header->judul = "Beranda : Trofi Webs";
    $a = mysql_fetch_array($tes);
    $halaman->konten->isi[0] = new getsum(new artikel($a[0]));
    $a = mysql_fetch_array($tes);
    $halaman->konten->isi[1] = new getsum(new artikel($a[0]));
    //$halaman->konten->isi[2] = new extrapanel();
    $halaman->footer->isi = "Design by Aloha";
?>
