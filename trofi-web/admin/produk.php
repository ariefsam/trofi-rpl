<?php
$aksi='aksi_produk.php';
switch($_GET[act]){
  // Tampil Produk
  default:
    echo "<h2>ARTIKEL</h2>
          <input type=button value='Tambah Artikel' onclick=\"window.location.href='?module=halaman&act=tambahproduk';\">
          <table>
          <tr><th>no</th><th>Judul</th><th>aksi</th></tr>";

    $tampil = mysql_query("SELECT * FROM halaman");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      //$tanggal=tgl_indo($r[tgl_masuk]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
		            <td><a href=?module=halaman&act=editproduk&id=$r[id]>Edit</a> |
		                <a href=$aksi?module=halaman&act=hapus&id=$r[id]>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahproduk":
    echo "<h2>Tambah Artikel</h2>
          <form method=POST action='$aksi?module=halaman&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td width=70>Judul Artikel</td>     <td> : <input type=text name='judul' size=60></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id]>$r[nama]</option>";
            }
    echo "</select></td></tr>
          <tr><td>Isi Artikel</td>  <td> <textarea name='isi' style='width: 600px; height: 300px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>
          <tr><td>Resume Gambar</td>     <td> : <input type=text name='resume_gambar' size=40></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editproduk":
    $edit = mysql_query("SELECT * FROM halaman WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Artikel</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=halaman&act=update>
          <input type=hidden name=id value=$r[id]>
          <table>
          <tr><td width=70>Judul Artikel</td>     <td> : <input type=text name='judul' size=60 value='$r[judul]'></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama");
          if ($r[kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[kategori]==$w[id]){
              echo "<option value=$w[id] selected>$w[nama]</option>";
            }
            else{
              echo "<option value=$w[id]>$w[nama]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td>Isi Artikel</td>   <td> <textarea name='isi' style='width: 600px; height: 300px;'>$r[isi]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  
          <img src='../pictures/$r[gambar]'></td></tr>
          <tr><td>Resume Gambar</td>     <td> : <input type=text name='resume_gambar' value=$r[resume_gambar] size=40></td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
?>
