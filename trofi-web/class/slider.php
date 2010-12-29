<?php
class slider{
    public $panel;
    function addPanel($judul,$gambar,$isi,$link){
        $this->panel[count($this->panel)] = $judul;
    }
    function tampilkan(){
        ?>
        <div id="mygallery">
        <div class="contenthol">
        <?php //foreach ?>
        <!-- Start of Slide -->
        <div class="con">
        <div class="inner">
        <div class="projecttitle">Pertanian</div>
        <div class="projectdesc"><p>Pertanian merupakan sektor yang sangat menguntungkan. Selama Manusia hidup, pertanian selalu akan menjadi.....</p>
        <img src="images/preview3.png" class="preview" alt="preview" />
        <span><a href="#">Read More</a></span></div>
        </div>
        </div>
        <!-- End of Slide -->

        <!-- Start of Slide -->
        <div class="con">
        <div class="inner">
        <div class="projecttitle">Info Tanam</div>
        <div class="projectdesc"><p>Penanaman dalam pertanian sangat berguna jika didukung oleh informasi penanaman yang baik.... bagus..........</p>
        <img src="images/preview3.png" class="preview" alt="preview" />
        <span><a href="#">Read More</a></span></div>
        </div>
        </div>
        <!-- End of Slide -->

        </div>
        </div>
            <?php
    }
}
?>
