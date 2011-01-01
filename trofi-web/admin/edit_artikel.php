<?php
session_start();
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
require "header.php";
$id = $_GET['id'];
require "../class/artikel.php";
$artikel = new artikel($id);
$kategori = get_semua_kategori();
        ?>

<div class="pad20">

    <!-- Tabs -->
    <div id="tabs">
        <ul>
            <li><a href="">Forms Preview</a></li>
            <li><a href="">Tables</a></li>
            <li><a href="">Framework Icons &amp; Buttons</a></li>
        </ul>

        <!-- First tab -->
        <div id="tabs-1">
            <!-- Form -->
            <form method="post" action="edit_artikel_p.php">
                <!-- Fieldset -->
                <fieldset>
                    <p>
                        <label for="lf">Judul: </label>
                        <input name="id" value="<?php echo $artikel->id?>" type="hidden" />
                        <input class="lf" name="judul" type="text" value="<?php echo $artikel->judul?>" />
                    </p>
                    
                    <p>
                        <label for="dropdown">Kategori: </label>
                        <select name="kategori" class="dropdown">
                            <?php foreach($kategori as $k) {
                            ?>
                            <option value="<?php echo $k['id']?>"<?php if ($k['id']==$artikel->kategori) echo " \"selected\""?>><?php echo $k['nama']?></option>
                            <?php }?>
                        </select>
                    </p>                    
                    <p>
                        <!-- WYSIWYG editor -->
                        <textarea cols="80" rows="10" class="wysiwyg" name="isi"><?php echo $artikel->isi?></textarea>
                        <!-- End of WYSIWYG editor -->
                    </p>
                    <p>
                        <input class="button" type="submit" value="Update" name="submit" />
                        <input class="button" type="reset" value="Reset" />
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