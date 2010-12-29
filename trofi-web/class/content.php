<?php
class content{
    public $isi;
    function content(){

    }
    function tampilkan(){ ?>
        <div id="lc">
        <?php
            foreach ($this->isi as $x){
                $x->tampilkan();
            }
        ?>
        </div>
    <?php
    }
}
?>
