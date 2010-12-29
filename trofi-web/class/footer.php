<?php
class footer{
    public $isi;
    public $link;
    function footer(){
        $this->isi = "Trofi-Webs design by Aloha - <a href=\"#\">View our website</a>";
    }
    function tampilkan(){?>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div id="footer">
        <div id="innerfoot"> <?php echo $this->isi;?>
        </div>
        </div>
        </body>
        </upbody>
        </html>
        <?php
    }
}
?>
