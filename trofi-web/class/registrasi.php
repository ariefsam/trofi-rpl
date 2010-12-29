<?php
class registrasi{
    public $state;
    public $nama;
    public $no_hp;
    public $email;
    public $alamat;
    function registrasi($state=1,$nama="",$no_hp="",$email="",$alamat=""){
        $this->state = $state;
        $this->nama = $nama;
        $this->no_hp = $no_hp;
        $this->email = $email;
        $this->alamat = $alamat;        
    }
    function tampilkan(){?>
        <h2>Registrasi</h2>
        <?php
        if($this->state==0){?>
        <div class="warning">Password yang Anda Masukkan berbeda</div>
        <?php }
        ?>
        <div id="form">
        <form class="submitform" action="?h=registrasi" method="post">
        <table border="0">
            <tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo $this->nama?>" /></td></tr>
            <tr><td>No. Handphone</td><td><input type="text" name="no_hp" value="<?php echo $this->no_hp?>" /></td></tr>
            <tr><td>Email</td><td><input type="text" name="email" value="<?php echo $this->email?>" /></td></tr>
            <tr><td>Password</td><td><input type="password" name="password" /></td></tr>
            <tr><td>Tulis Kembali Password</td><td><input type="password" name="repassword" /></td></tr>
            <tr><td>Alamat</td><td><textarea rows="5" cols="20" name="alamat"><?php echo $this->alamat?></textarea></td></tr>
            <tr><td></td><td><input type="submit" value="Daftar" /></td></tr>
        </table>
        </form></div><?php
    }
}
?>
