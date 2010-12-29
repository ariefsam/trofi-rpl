<?php
class UnderContent{
    public $judul;
    public $isi;
    public $gambar;
    public $id;

    function tampilkan(){?>
        <div class="portmain">
        <a href=""><img src="pictures/<?php echo $this->gambar?>" alt="thumbnail" width="184" height="153" /></a>
        <div class="portinfo">
        <h3><?php echo $this->judul?></h3>
        <?php echo $this->isi;
        $id = $this->id;
        echo "<br /><a href=\"?h=artikel&id=$id\">Read More</a>";?></div>
        <div class="clear"></div>

        </div><?php
    }
}

?>
