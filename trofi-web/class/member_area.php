<?php
class member_area{
    public $id_member;
    public $member;
    function member_area($berdasarkan="registrasi", $nilai=0){
        $this->id_member = $nilai;
        if($berdasarkan=="id"){
            $this->member = new member($nilai);
        }

    }
    function tampilkan(){
        $iklan = new tampilkan_iklan("member", $this->member->id, "Iklan " . $this->member->nama);
        ?>
<h2>Profil</h2>
<table>
    <tr>
        <td width="50px">Nama</td>
        <td>: <?php echo $this->member->nama?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?php echo $this->member->alamat?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?php echo $this->member->email?></td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: <?php echo $this->member->no_hp?></td>
        </tr>
</table>
<a href="?h=logout">Logout</a><br />
<a href="?h=tambah_iklan">Tulis Iklan</a>
        <?php $iklan->tampilkan();?>
    <?php }
}

?>
