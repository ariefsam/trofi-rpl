<?php
class artikel{
    public $gambar;
    public $resume_gambar;
    public $judul;
    public $isi;
    public $id;
    public $tanggal;
    public $kategori;
    function artikel($id){
        $queri = mysql_query("SELECT * FROM halaman WHERE id=$id");
        $artikel = mysql_fetch_array($queri);
        $this->judul = $artikel['judul'];
        $this->isi = $artikel['isi'];
        $this->gambar = $artikel['gambar'];
        $this->resume_gambar = $artikel['resume_gambar'];
        $this->id=$id;
        $this->tanggal = $artikel['tanggal'];
        $this->kategori = $artikel['kategori'];
    }
    function tampilkan(){
        ?>
        <h2><?php echo $this->judul ?></h2>
        <em><?php echo $this->tanggal . "<br /><br />"?></em>
        <div class="imageleft"><img src="pictures/<?php echo $this->gambar?>" alt="<?php echo $this->judul?>" border="0" width="184" height="153" title="<?php echo $this->judul?>" />
              <div class="text"><?php echo $this->resume_gambar?></div>
            </div>
            <?php //<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel nunc in nunc aliquet rhoncus. Vivamus tortor magna, faucibus eu aliquam in, fringilla in risus. Vestibulum diam purus, mollis at condimentum nec, cursus id eros. Phasellus ut sapien lectus. Nunc sit amet tellus est. Praesent vel dui eros, in rhoncus nibh. Etiam gravida, velit at posuere commodo, lacus justo cursus erat, nec fringilla lorem felis a ligula. Praesent nunc quam, suscipit a aliquam et, ornare et risus. Donec rhoncus, sapien vitae interdum luctus, erat odio congue tellus, vitae aliquet nisi odio sit amet augue. Morbi mollis porta tincidunt. Cras at urna ac ligula fringilla rhoncus. </p>
                echo $this->isi;
    }

}

?>
