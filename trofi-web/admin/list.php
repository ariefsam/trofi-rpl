<?php
session_start();
require 'fungsi.php';
require "../dbconfig.php";
if(!loginkah()) header("Location: login.php");
require "header.php"
        ?>

<div id="tabs-2">
    <p>Artikel teranyar</p>
    <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
        <thead>
            <tr>
                <td>No</td>
                <td>Tanggal</td>
                <td>Judul</td>
                <td>Kategori</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $artikel = get_semua_artikel(0);
            $i=1;
            foreach ($artikel as $a) {?>
            <tr class="odd">
                <td><?php echo $i++?></td>
                <td><?php echo $a['tanggal']?></td>
                <td><?php echo $a['judul']?></td>
                <td><?php echo get_kategori($a['kategori'])?></td>
                <td></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <p>This is a normal table, content defines its width.</p>

</div>

<!-- End of Main Content -->
<?php require "footer.php"?>