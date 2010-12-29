<?php
class menu{
    function tampilkan(){?>
        <div id="rc">
        <h3>Kategori</h3>
        <?php
        $queri = mysql_query("SELECT * FROM kategori")?>
        <ul>
            <?php while($q = mysql_fetch_array($queri)){?>
        <li><a href="?h=artikel&kategori=<?php echo $q['id']?>"><?php echo $q['nama']?></a></li>
        <?php }?>
        </ul>
        <h3>Iklan Terbaru</h3>
        <div class="testimonial">
        <?php $queri = mysql_query("SELECT id FROM iklan order by id desc limit 0,5");
        while ($q = mysql_fetch_array($queri)){
            $iklan = new iklan($q[0]);?>        
        <h4><?php echo $iklan->judul?></h4>        
        <p><em><?php echo $iklan->isi?></em></p>
        <p><?php echo $iklan->member->nama?></p>
        <span class="tanggal"><?php echo $iklan->tanggal?></span>
        <br />
        <br />
        <?php } ?>
        <a href="./?h=iklan">Iklan lengkap</a>
        </div>

        </div><?php }
    
}

?>
