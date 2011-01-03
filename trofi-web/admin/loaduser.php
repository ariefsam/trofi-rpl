<?php
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
$id = $_GET['id'];
$no = $_GET['no'];
$a = get_user($id);
?>
<tr id="row<?php echo $a['id']?>" class="<?php if($i%2==0) echo 'even'; else echo 'odd';?>">
    <td><?php echo $no?></td>
    <td><?php echo $a['nama']?></td>
    <td><?php echo $a['alamat']?></td>
    <td><?php echo $a['no_hp']?></td>
    <td><?php echo $a['email']?></td>
    <td><?php echo $a['tgl_registrasi']?></td>
    <td width="60px">
        <ul class="ui-widget ui-helper-clearfix" id="icons">

        <li title="Edit" class="ui-state-default ui-corner-all">
            <a href="#" onclick="edit(<?php echo $a['id']?>)"><span class="ui-icon ui-icon-pencil">&nbsp;</span></a>
        </li>
        <li title="Hapus" class="ui-state-default ui-corner-all">
            <a href="#row<?php echo $a['id']?>" onclick="hapus(<?php echo $a['id']?>)"><span class="ui-icon ui-icon-closethick"></span></a>
        </li>
        </ul>
    </td>
</tr>