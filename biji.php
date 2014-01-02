<?php 
 error_reporting (~E_NOTICE);
include "conn.php"; 
?>
<form name="form1" method="post" action="?page=bijitambah">
<table class="datatable">
		<tr>
        <td align="right"><b>Pilih Kelas : </b></td>
        <td>
		<select name="cmbkelas">
        <option value="" selected>[ Pilih Kelas ]</option>
      <?php
$sql= "select*from kelas order by kd_kelas";
$qry= @mysql_query($sql,$koneksi)
        or die ("gagal query");
while ($data=mysql_fetch_array($qry)){
    if ($data[kd_kelas]==$_POST['cmbkelas']){
        $cek="selected";
    }
    else{
        $cek="";
    }
    echo "<option value='$data[kd_kelas]'$cek>$data[nama_kelas]</option>";
    }
?>
    </select>
     <input name="tbshow" type="submit" value="Tampilkan">
     </td>
</tr>
</table>
</form>
