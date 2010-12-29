<?php
class member{
    public $id;
    public $nama;
    public $email;
    public $alamat;
    public $no_hp;
    public $password;
    function member($id){
        $queri = mysql_fetch_array(mysql_query("SELECT * FROM member WHERE id=$id"));
        $this->id = $queri['id'];
        $this->nama = $queri['nama'];
        $this->email = $queri['email'];
        $this->alamat = $queri['alamat'];
        $this->no_hp = $queri['no_hp'];
        $this->password = $queri['password'];
    }
}
?>
