<?php
function get_semua_artikel($halaman, $jumlah=30){
    $mulai = $halaman * $jumlah;
    $queri = mysql_query("SELECT * FROM halaman limit $mulai,$jumlah");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}
function get_semua_kategori(){
    $queri = mysql_query("select * from kategori");
    while ($q = mysql_fetch_array($queri)){
        $data[] = $q;
    }
    return $data;
}
function loginkah(){
    if ($_SESSION['admin']) return true;
    else return false;
}
function login($username,$password){
    $password = md5($password);
    $queri = mysql_query("SELECT * FROM admin where username='$username' and password='$password'");
    $q = mysql_fetch_array($queri);
    if($q){
        $_SESSION['admin'] = $q['username'];
        return true;
    }
}
function logout(){
    session_destroy();
}

function get_kategori($id){
       $q = mysql_fetch_array(mysql_query("SELECT * FROM kategori where id=$id"));
       return $q[1];
}