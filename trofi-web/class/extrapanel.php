<?php
class extrapanel{
    public $panel1;
    public $panel2;
    public $panel3;
    function extrapanel(){
        $this->panel1 = array("judul"=>"Peluang Usaha", "isi"=>"Website ini menyediakan berbagai layanan peluang usaha.","link"=>"#", "jenis"=>"moneyback");
        $this->panel2 = array("judul"=>"Online Support", "isi"=>"Untuk memaksimalkan layanan, kami menyediakan online support.","link"=>"#", "jenis"=>"onlinesupport");
        $this->panel3 = array("judul"=>"Member Area", "isi"=>"Pemasangan iklan dan edit data di Member area.","link"=>"#", "jenis"=>"clientarea");    }
    function tampilkan(){ ?>
        <div id="extrapanel">
            <div class="panel" id="<?php echo $this->panel1["jenis"]?>">
                <strong><?php echo $this->panel1['judul']?></strong><br />
                <?php echo $this->panel1['isi']?><br />
                <a href="<?php echo $this->panel1['link']?>">Click Here</a>
            </div>
            <div class="panel" id="<?php echo $this->panel2["jenis"]?>">
                <strong><?php echo $this->panel2['judul']?></strong><br />
                <?php echo $this->panel2['isi']?><br />
                <a href="<?php echo $this->panel2['link']?>">Click Here</a>
            </div>
            <div class="panel" id="<?php echo $this->panel3["jenis"]?>">
                <strong><?php echo $this->panel3['judul']?></strong><br />
                <?php echo $this->panel3['isi']?><br />
                <a href="<?php echo $this->panel3['link']?>">Click Here</a>
            </div>
        </div><?php
    }
}

?>
