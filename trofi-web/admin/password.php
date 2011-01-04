<?php
session_start();
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");

function salah_password(){?>
<div class="message error close">
        <h2>Error!</h2>
        <p>Password lama yang Anda masukkan salah</p>
</div>

<?php }

function salah_repassword(){?>
<div class="message error close">
        <h2>Error!</h2>
        <p>Password baru tidak sesuai</p>
</div>

<?php }

function berhasil(){?>
<div class="message success close">
    <h2>Berhasil!</h2>
    <p>Password Admin telah diganti.... Mohon ingat baik-baik password Anda!<p>
</div>

<?php }
$state = "normal";
if($_POST['submit']){
    $password_lama = md5($_POST['password_lama']);
    $password = md5($_POST['password']);
    $repassword = md5($_POST['repassword']);
    $admin = mysql_fetch_array(mysql_query("SELECT * FROM `admin`"));
    if($password_lama != $admin['password']){
        $state = "salah_password";
    }
    else if ($password != $repassword){
        $state = "salah_repassword";
    }
    else {
        $queri = mysql_query("UPDATE admin set password = '$password'");
        $state = "berhasil";
    }

}
require "header.php";?>

<div class="pad20">

    <!-- Tabs -->
    <div id="tabs">
        <ul>
            <li><a href="#">Ganti Password</a></li>
        </ul>

        <!-- First tab -->
        <div id="tabs-1">
            <!-- Form -->
            <form method="post" action="password.php" enctype='multipart/form-data'>
                <?php
                if($state=="salah_password") salah_password();
                else if($state=="salah_repassword") salah_repassword();
                else if($state=="berhasil") berhasil();
                ?>
                <!-- Fieldset -->
                <fieldset>
                    <p>
                        <label for="lf">Password Lama: </label>
                        <input class="lf" name="password_lama" type="password" value="" />
                    </p>
                    <p>
                        <label for="lf">Password Baru: </label>
                        <input class="lf" name="password" type="password" value="" />
                    </p>
                    <p>
                        <label for="lf">Ketik Ulang Password Baru: </label>
                        <input class="lf" name="repassword" type="password" value="" />
                    </p>
                    <p>
                        <input class="button" type="submit" value="Proses" name="submit" />
                    </p>
                </fieldset>
                <!-- End of fieldset -->
            </form>
            <!-- End of Form -->
        </div>
        <!-- End of First tab -->

    </div>
    <!-- End of Tabs -->
</div>

<!-- End of Main Content -->

<?php require "footer.php"?>