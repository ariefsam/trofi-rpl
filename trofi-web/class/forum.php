<?php
class forum{
    function forum(){

    }
    function buat_thread($judul,$isi,$member){
        $queri = mysql_query("INSERT INTO forum_thread(judul,isi,ts,tanggal) VALUES ('$judul','$isi',$member,now())");
    }
    function reply($isi,$thread,$member){
        $queri = mysql_query("INSERT INTO forum_content(thread,isi,member,tanggal) VALUES ($thread,'$isi',$member,now())");
    }

}
class reply{
    public $id;
    public $thread;
    public $member;
    public $isi;
    public $tanggal;
    function reply($id){
        $x = new database("SELECT * FROM forum_content WHERE id=$id");
        $x = $x->getResult();
        $z = $x[0];
        $this->id=$id;
        $this->isi=$z['isi'];
        $this->member = new member($z['member']);
        $this->tanggal = $z['tanggal'];
        $this->thread = $z['thread'];

    }
}
class thread{
    public $id;
    public $judul;
    public $isi;
    public $member;
    public $tanggal;
    function thread($id){
        $queri = mysql_fetch_array(mysql_query("SELECT * FROM forum_thread WHERE id=$id"));
        $this->id = $id;
        $this->judul = $queri['judul'];
        $this->isi = $queri['judul'];
        $this->member = new member($queri['ts']);
        $this->tanggal = $queri['tanggal'];
    }
    function tampilkan(){?>
<h2>Forum</h2>
<div class="thread">
    <div class="judul">
        <?php echo $this->judul?>
    </div>
    <div class="pengirim">
        <?php echo $this->member->nama?>
    </div>
    <div class="tanggal">
        <?php echo $this->tanggal?>
    </div>
    <div class="isi">
        <?php echo $this->isi?>
    </div>
    <br />
</div>
<?php
$queri = mysql_fetch_array(mysql_query("SELECT count(id) FROM forum_content WHERE thread=" . $this->id));
$total_item = $queri[0];
$jumlah_perhalaman = 20;
$hal = $_GET['hal']-1;
if(!$_GET['hal']) $hal=0;
$mulai = $hal*$jumlah_perhalaman;
$jumlah_halaman = ceil($total_item/$jumlah_perhalaman);
$link = "./?h=forum&s=t&id=" . $this->id;
$pagination = new pagination(($hal+1),$total_item,$jumlah_perhalaman,$link,"hal");
$x = new database("SELECT id FROM forum_content WHERE thread=" . $this->id . " ORDER by id limit $mulai, $jumlah_perhalaman");
$x = $x->getResult();
if($x){
foreach($x as $z){
    $balasan = new reply($z['id']);
?>
<div class="thread">
    <div class="judul">
        <?php echo $balasan->judul?>
    </div>
    <div class="pengirim">
        <?php echo $balasan->member->nama?>
    </div>
    <div class="tanggal">
        <?php echo $balasan->tanggal?>
    </div>
    <div class="isi">
        <?php echo $balasan->isi?>
    </div>
    <br />
</div>
<?php }
}
$pagination->tampilkan();
if($_SESSION['id_member']) {?>
Balas:
<div>
    <form action="./?h=forum&s=r&id=<?php echo $this->id?>" method="POST">
    <textarea name="balas" cols="90"></textarea><br />
    <input type="submit" value="Kirim" />
    </form>
</div>


    <?php } }
}
class tampilan_forum{
    public $state;
    public $value;
    function tampilan_forum($state="kumpulan_thread", $value=""){
        $this->state=$state;
    }
    function tampilkan(){


    #============HALAMAN FORM PEMBUATAN THREAD BARU=================
        
    if($this->state=="buat"){?>
    

<h2>Buat Thread Baru</h2>
<div class="forum">
    <form action="?h=forum&s=b" method="POST">
        Judul Thread:<br /><br />
        <input type="text" name="judul" /><br /><br />
        Isi: <br /><br />
        <textarea name="isi" cols="70" rows="10"></textarea>
        <p><input type="submit" value="Kirim" /></p>
    </form>
</div>
    <?php }


    #==================HALAMAN MENAMPILKAN THREAD TERBARU====================
    if($this->state=="kumpulan_thread"){
        ?>
<h2>Forum</h2>
        <?php
        $queri = mysql_fetch_array(mysql_query("SELECT count(id) FROM forum_thread"));
        $total_item = $queri[0];
        $jumlah_perhalaman = 20;
        $hal = $_GET['hal']-1;
        if(!$_GET['hal']) $hal=0;
        $mulai = $hal*$jumlah_perhalaman;
        $jumlah_halaman = ceil($total_item/$jumlah_perhalaman);
        $link = "./?h=forum";
        $pagination = new pagination(($hal+1),$total_item,$jumlah_perhalaman,$link,"hal");

        $queri = new database("SELECT id FROM forum_thread order by id desc limit $mulai, $jumlah_perhalaman");
        $q = $queri->getResult();
        foreach ($q as $t) {
        $thread = new thread($t['id']);?>

<div class="thread">
    <div class="judul">
        <a href="./?h=forum&s=t&id=<?php echo $thread->id?>"><?php echo $thread->judul?></a>
    </div>
    <div class="pengirim">
        <?php echo $thread->member->nama?>
    </div>
    <div class="tanggal">
        <?php echo $thread->tanggal?>
    </div>
</div>

        
    <?php } 
    
    $pagination->tampilkan();
    if ($_SESSION['id_member']){ ?>
    

<a href="./?h=forum&s=fb">Buat Thread Baru</a> <?php }
    }
}
}
?>
