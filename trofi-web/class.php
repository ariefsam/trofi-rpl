<?php
require "class/halaman.php";
require "class/header.php";
require "class/slider.php";
require "class/content.php";
require "class/extrapanel.php";
require "class/artikel.php";
require "class/getSum.php";
require "class/html.php";
require "class/menu.php";
require "class/UnderContent.php";
require "class/footer.php";
require "class/registrasi.php";
require "class/isiArtikel.php";
require "class/iklan.php";
require "class/member_area.php";
require "class/member.php";
require "class/login.php";
require "class/forum.php";
require "class/pagination.php";
//require "class/faq.php";
require "class/kebijakan_privasi.php";
require "class/about.php";
class database {

    public $queri;

    function database($queri) {
        $this->queri = $queri;
    }

    function getResult() {
        $queri = mysql_query($this->queri);
        while ($q = mysql_fetch_array($queri)) {
            $hasil[count($hasil)] = $q;
        }
        return $hasil;
    }

}
?>
