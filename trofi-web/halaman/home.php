<?php
    $tes = mysql_query("select * from halaman");
    $v = mysql_num_rows($tes);
    $halaman->header->judul = "Beranda : Trofi Webs";
    $halaman->konten->isi[0] = new getsum(new artikel($v));
    $halaman->konten->isi[1] = new getsum(new artikel($v-1));
    //$halaman->konten->isi[2] = new extrapanel();
    $halaman->footer->isi = "Design by Aloha";
?>
