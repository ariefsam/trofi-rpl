<?php
class getSum{
    public $artikel;
    function getSum($artikel){
        $this->artikel = $artikel;
    }
    function tampilkan(){?>
        <h2><?php echo $this->artikel->judul ?></h2>
        <div class="imageleft"><img src="pictures/<?php echo $this->artikel->gambar?>" alt="<?php echo $this->artikel->judul?>" border="0" width="184" height="153" title="<?php echo $this->artikel->judul?>" />
              <div class="text"><?php echo $this->artikel->resume_gambar?></div>
            </div>
            <?php //<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel nunc in nunc aliquet rhoncus. Vivamus tortor magna, faucibus eu aliquam in, fringilla in risus. Vestibulum diam purus, mollis at condimentum nec, cursus id eros. Phasellus ut sapien lectus. Nunc sit amet tellus est. Praesent vel dui eros, in rhoncus nibh. Etiam gravida, velit at posuere commodo, lacus justo cursus erat, nec fringilla lorem felis a ligula. Praesent nunc quam, suscipit a aliquam et, ornare et risus. Donec rhoncus, sapien vitae interdum luctus, erat odio congue tellus, vitae aliquet nisi odio sit amet augue. Morbi mollis porta tincidunt. Cras at urna ac ligula fringilla rhoncus. </p>
                echo substr($this->artikel->isi,0,500);
                echo "....<br />";
                $id = $this->artikel->id;
                echo "<a href=\"?h=artikel&id=$id\">Read More</a>";
    }
}
?>
