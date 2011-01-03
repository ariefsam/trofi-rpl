<?php
class iklan{
    public $id;
    public $member;
    public $judul;
    public $isi;
    public $tanggal;
    function iklan($id){
        $q = mysql_fetch_array(mysql_query("SELECT * FROM iklan where id=$id"));
        $this->id = $id;
        $this->member = new member($q['member']);
        $this->judul = $q['judul'];
        $this->isi = $q['isi'];
        $this->tanggal = $q['tanggal'];
    }
    function hapus(){
        $id=$this->id;
        $q = mysql_query("DELETE FROM iklan WHERE id=$id");
    }
    function edit($judul, $isi){
        $queri = mysql_query("UPDATE iklan SET judul='$judul', isi='$isi' WHERE id=" . $this->id);
    }
}

class edit_iklan{
    public $iklan;
    function edit_iklan($id){
        $this->iklan = new iklan($id);
    }
    function tampilkan(){?>
<h2>Edit Iklan</h2>
<form action="./?h=editiklan" method="POST">
    <input type="hidden" name="id" value="<?php echo $this->iklan->id?>" />
    Judul:<br />
    <input type="text" name="judul" value="<?php echo $this->iklan->judul?>" /><br />
    Isi:<br />
    <textarea name="isi" cols="80" rows="10"><?php echo $this->iklan->isi?></textarea>
    <input type="submit" value="Update" />
</form>
    <?php }
}
class tampilkan_iklan{
    public $state;
    public $value;
    public $judul;
    function tampilkan_iklan($state="semua",$value="",$judul="Iklan Trofi-webs"){
        $this->state=$state;
        $this->value=$value;
        $this->judul = $judul;
    }
    function tampilkan(){
        $member = $this->value;
    if($this->state=="semua"){
        $queri = mysql_fetch_array(mysql_query("SELECT count(id) FROM iklan"));
        $total_item = $queri[0];
        $jumlah_perhalaman = 20;
        $hal = $_GET['hal']-1;
        if(!$_GET['hal']) $hal=0;
        $mulai = $hal*$jumlah_perhalaman;
        $jumlah_halaman = ceil($total_item/$jumlah_perhalaman);
        $link = "./?h=iklan";
        $pagination = new pagination(($hal+1),$total_item,$jumlah_perhalaman,$link,"hal");
        $queri = mysql_query("SELECT id FROM iklan order by id desc limit $mulai, $jumlah_perhalaman");
    }
    else if ($this->state=="member") {
        $queri = mysql_query("SELECT id FROM iklan WHERE member=$member order by id desc");
        $pagination = new html("&nbsp;");
    }?>


<h2><?php echo $this->judul?></h2>
<?php

while($q = mysql_fetch_array($queri)){
    $iklan = new iklan($q[0]);?>
<div class="iklan">
    <div class="judul">
        <?php echo $iklan->judul?>
    </div>
    <div class="isi">
        <?php echo $iklan->isi?>
    </div>
    <div class="pengirim">
        <?php echo $iklan->member->nama?>
    </div>
    <div class="date">
        <?php echo $iklan->tanggal?>
    </div>
    <?php
    if($this->state=="member"){?>
    <a onclick="hapus(<?php echo $iklan->id?>); return false;" href="#">Hapus Iklan</a>
    <br />
    <a href="./?h=editiklan&id=<?php echo $iklan->id?>">Edit Iklan</a>
    <?php }
    ?>
</div>
<script type="text/javascript">
    function hapus(id){
        if(confirm('Yakin akan menghapus iklan ini? Iklan yang sudah dihapus tidak dapat dikembalikan')){
            window.location = 'index.php?h=hpsiklan&id=' + id;
        }
    }
</script>
<?php }
?>
    <?php 
    $pagination->tampilkan();
    }
}
class tambah_iklan{
    function tampilkan(){?>
            <h2>Tambah Iklan</h2>
            <form action="?h=iklanp" method="POST">
                <table>
                    <tr>
                        <td>Judul Iklan</td>
                        <td><input type="text" name="judul"></td>
                    </tr>
                    <tr>
                        <td>Isi</td>
                        <td><textarea name="isi"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Tambah"/></td>
                    </tr>

                </table>
            </form>
    <?php }
}
?>
