<?php

$state=1;
$proses = new halaman();
$proses->header->activeMenu = "member";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$repassword = md5($_POST['repassword']);
$noHp = $_POST['no_hp'];
if($password == $repassword) {
    if($_POST['nama']) {
        $queri = mysql_query("INSERT INTO member (nama,alamat,no_hp,email,password) VALUES ('$nama','$alamat','$noHp','$email','$password')");
        if($queri) {
            $q = mysql_fetch_array(mysql_query("SELECT * FROM member WHERE email='$email' and password='$password'"));
            $id_member = $q['id'];
            $_SESSION['id_member']=$id_member; header("Location: ?h=member");
        }
        else $proses->konten->isi[0] = new html("<h2>Registrasi</h2>Gagal");
    }
    else $proses->konten->isi[0]=new registrasi();    
}
else {
    $state=0;
}
$halaman = $proses;
$halaman->konten->isi[0] = new registrasi($state,$nama,$noHp,$email,$alamat);

?>
