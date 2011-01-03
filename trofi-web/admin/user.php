<?php
session_start();
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
require "header.php"
        ?>

<div id="tabs-2">
    <p>Daftar Member</p>
    <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>No Hp</td>
                <td>Email</td>
                <td>Tgl Registrasi</td>
                <td width="50px" style="width: 50px"></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $artikel = get_semua_user(0);
            $i=1;
            foreach ($artikel as $a) {?>
            <tr id="row<?php echo $a['id']?>" class="<?php if($i%2==0) echo 'even'; else echo 'odd';?>">
                <td><?php echo $i?></td>
                <td><?php echo $a['nama']?></td>
                <td><?php echo $a['alamat']?></td>
                <td><?php echo $a['no_hp']?></td>
                <td><?php echo $a['email']?></td>
                <td><?php echo $a['tgl_registrasi']?></td>
                <td width="60px">
                    <ul class="ui-widget ui-helper-clearfix" id="icons">

                    <li title="Edit" class="ui-state-default ui-corner-all">
                        <span class="ui-icon ui-icon-pencil" onclick="edit(<?php echo $a['id']?>)">&nbsp;</span>
                    </li>
                    <li title="Hapus" class="ui-state-default ui-corner-all">
                        <span class="ui-icon ui-icon-closethick" onclick="hapus(<?php echo $a['id']?>)"></span>
                    </li>
                    </ul>
                </td>
            </tr>
        <form id="form<?php echo $a['id']?>" method="post" action="update_user.php?id=<?php echo $a['id']?>">
            <tr id="edit<?php echo $a['id']?>" class="<?php if($i%2==0) echo 'even'; else echo 'odd';?>" style="display: none">
                <td><?php echo $i++?></td>
                <td><input type="text" name="nama" value="<?php echo $a['nama']?>"</td>
                <td><textarea name="alamat" cols="50" rows="3" style="background: none; height: 50px; width: 150px;" ><?php echo $a['alamat']?></textarea></td>
                <td><input type="text" name="no_hp" style="width: 100px" value="<?php echo $a['no_hp']?>" /></td>
                <td><input type="text" name="email" value="<?php echo $a['email']?>" /></td>
                <td><?php echo $a['tgl_registrasi']?></td>
                <td width="60px">
                    <ul class="ui-widget ui-helper-clearfix" id="icons">
                    <li title="Update" class="ui-state-default ui-corner-all">
                        <span class="ui-icon ui-icon-disk" onclick="$('#form<?php echo $a['id']?>').submit();">&nbsp;</span></a>
                    </li>
                    <li title="Batal" class="ui-state-default ui-corner-all">
                        <span class="ui-icon ui-icon-arrowreturnthick-1-w" onclick="batal(<?php echo $a['id']?>)">&nbsp;</span>
                    </li>
                    </ul>
                </td>
            </tr>
        </form>
            <?php }?>
        </tbody>
    </table>
    

</div>

<!-- End of Main Content -->
<script type="text/javascript">
    function hapus(id) {
        if (confirm("Yakin akan menghapus member ini? Data member yang sudah dihapus tidak akan dapat dikembalikan lagi.")) {
                $.ajax({
                        url: 'delete_user.php',
                        data: 'del=' + id,
                        success: function(data) {
                                $('#row' + id).fadeOut('slow');

                        }

                });
        }
        }
    function edit(id) {
    $('#row' + id).fadeOut("fast", function(){$('#edit' + id).fadeIn('fast')})
    }
    function batal(id){
        $('#edit' + id).fadeOut("fast", function(){$('#row' + id).fadeIn("fast")})
    }
</script>
<?php require "footer.php"?>