<?php
class login{
    function tampilkan(){?>
<h2>Login</h2>
<div><em>Belum punya akun? <a href="?h=registrasi">Daftar di sini</a><br /><br /></em></div>
<form action="?h=logp" method="post">
<table>
    <tr>
        <td style="font-size:  large">Email</td>
        <td>: <input type="text" name="email" style="font-size:  large" /></td>
    </tr>
    <tr>
        <td style="font-size:  large">Password</td>
        <td>: <input type="password" name="password" style="font-size:  large" /></td>
    </tr>
    <tr>
        <td></td>
        <td valign="bottom" style="vertical-align: bottom; font-size: small"> <input type="checkbox" name="remember" /> Ingat Saya di komputer ini
    </td>
    </tr>
    <tr>
        <td></td>
        <td> &nbsp;<input type="submit" value="Login" /></td>
    </tr>
</table>
</form>

    <?php }
}
?>
