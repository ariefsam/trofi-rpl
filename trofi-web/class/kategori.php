<?php
class kategori{
   public $id;
   public $nama;
   function kategori($id){
       $q = mysql_fetch_array(mysql_query("SELECT * FROM kategori where id=$id"));
       $this->id = $id;
       $this->nama = $q[1];
   }

}