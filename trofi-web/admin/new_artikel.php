<?php
session_start();
require "../dbconfig.php";
require 'fungsi.php';
if(!loginkah()) header("Location: login.php");
require "header.php";
$id = $_GET['id'];
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
            <form method="post" action="new_artikel_p.php" enctype='multipart/form-data'>
                <!-- Fieldset -->
                <fieldset>
                    <p>
                        <label for="lf">Judul: </label>
                        <input class="lf" name="judul" type="text" value="" />
                    </p>

                    <p>
                        <label for="dropdown">Kategori: </label>
                        <select name="kategori" class="dropdown">
                            <?php foreach($kategori as $k) {
                            ?>
                            <option value="<?php echo $k['id']?>"><?php echo $k['nama']?></option>
                            <?php }?>
                        </select>
                    </p>
                    <p>
                        <label for="lf">Gambar: </label>
                        <input type="file" name="fupload" size="40" class="lf" />
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
                    </p>
                    <p>
                        <label for="lf">Resume Gambar: </label>
                        <input type="text" name="resume_gambar" class="lf" />
                    </p>
                    <p>
                        <!-- WYSIWYG editor -->
                        <textarea cols="80" rows="10" class="wysiwyg" name="isi"></textarea>
                        <!-- End of WYSIWYG editor -->
                    </p>
                    <p>
                        <input class="button" type="submit" value="Terbitkan" name="submit" />
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