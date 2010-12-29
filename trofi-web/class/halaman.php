<?php
class halaman{
    public $header;
    public $slider;
    public $konten;
    public $menu;
    public $footer;
    function halaman(){
        $this->header = new header("Trofi-Webs");
        $this->header->activeMenu = "home";
        $this->header->style_body = "background-image: url('images/headers.jpg')";
        $this->slider = new html(" ");
        $this->konten = new content();
        $this->menu = new menu();
        $this->footer = new footer();
    }
    function tampilkan(){
        $this->header->tampilkan();
        $this->slider->tampilkan();
        $this->konten->tampilkan();
        $this->menu->tampilkan();
        $this->footer->tampilkan();
    }

}
?>
