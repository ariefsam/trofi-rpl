<?php
    $halaman->header->judul = "Beranda : Trofi Webs";
    $halaman->konten->isi[0] = new getsum(new artikel(3));
    $halaman->konten->isi[1] = new getsum(new artikel(4));
    //$halaman->konten->isi[2] = new extrapanel();
    $halaman->footer->isi = "Design by Aloha";
?>
