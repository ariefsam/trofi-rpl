<?php
class header {
    public $judul;
    public $wraper;
    public $activeMenu;
    public $style_body;
   // $classMenu = array();
    function header($judul){
        $this->judul = "Trofi";
       // $this->activeMenu = "home";
    }
    function cek($cek){
        if ($this->activeMenu==$cek) echo " class=\"current_page_item\"";
    }
    function tampilkan(){
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $this->judul?></title>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <!--[if IE]>
        <link rel="stylesheet" href="iestyle.css" type="text/css" media="screen" /<
        < ![endif]-->
        <script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
        <script type="text/javascript" src="jquery.form.js"></script>
        <script type="text/javascript" src="stepcarousel.js"></script>
        <script type="text/javascript" src="carousel.js"></script>
        <script type="text/javascript" src="portfolio.js"></script>


        </head>

            <upbody>
        <body style=" <?php echo $this->style_body?>">
        <div id="wrapper">
        <div id="head">
        <div id="logo"><h1><a href="">Trofi</a></h1></div>
        </div>
        <div id="nav">
        <ul>
        <li<?php $this->cek("home")?>><a href="./">Home</a></li>
        <li<?php $this->cek("artikel")?>><a href="./?h=artikel">Artikel</a></li>
        <li<?php $this->cek("forum")?>><a href="./?h=forum">Forum</a></li>
        <li<?php $this->cek("FAQ")?>><a href="./?h=faq">FAQ</a></li>
        <li<?php $this->cek("about")?>><a href="./?h=about">About</a></li>
        <li<?php $this->cek("iklan")?>><a href="./?h=iklan">Iklan</a></li>
        <li<?php $this->cek("member")?>><a href="./?h=member">Member Area</a></li>
        </ul>
        <div class="clear"></div>
        </div>
        <?php
    }
}
?>
