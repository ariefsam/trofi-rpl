<?php
session_start();
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
require "header.php";
require "../class/member.php";
        ?>

<div id="tabs-2">
    <p>Daftar Iklan</p>
    <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
        <thead>
            <tr>
                <td>No</td>
                <td>Member</td>
                <td>Judul</td>
                <td>Isi</td>
                <td>Tgl Pasang</td>
                <td width="25px" style="width: 25px"></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $artikel = get_semua_iklan(0);
            $i=1;
            foreach ($artikel as $a) {?>
            <tr id="row<?php echo $a['id']?>" class="<?php if($i%2==0) echo 'even'; else echo 'odd';?>">
                <td><?php echo $i++?></td>
                <td>
                    <?php $member = new member($a['member']);
                    echo $member->nama;?></td>
                <td><?php echo $a['judul']?></td>
                <td><?php echo $a['isi']?></td>
                <td><?php echo $a['tanggal']?></td>
                <td width="60px">
                    <ul class="ui-widget ui-helper-clearfix" id="icons">                    
                    <li title="Hapus" class="ui-state-default ui-corner-all">
                        <span class="ui-icon ui-icon-closethick" onclick="hapus(<?php echo $a['id']?>)"></span>
                    </li>
                    </ul>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>


</div>

<!-- End of Main Content -->
<script type="text/javascript">
    function hapus(id) {
        if (confirm("Yakin akan menghapus member ini? Data member yang sudah dihapus tidak akan dapat dikembalikan lagi.")) {
                $.ajax({
                        url: 'delete_iklan.php',
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