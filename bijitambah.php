<?php
include "conn.php";
?>
<form name="form1" method="post" action="?page=bijisim">
  <table>
    <tr>
      <th>No</th>
	  <th>Kelas</th>
      <th>Nama</th>
      <th>Mata Pelajaran</th>
      <th>Nilai</th>
	  <th>Tanggal</th>
    </tr>
    <?php
if (! trim($_POST['cmbkelas'])==""){
    $sql="select*from siswa where kd_kelas='".$_POST['cmbkelas']."'";
}
else{
		$sql="select * from siswa order by kd_siswa";
	}
		$qry=mysql_query($sql,$koneksi)
        or die ("gagal berita");
		while ($data=mysql_fetch_array($qry)){
   		 $no++;
		 ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><select name="cmbkelas">
          <option value="" selected></option>
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
      </td>
	  <td><select name="cmbsiswa">
          <option value="notsiswa" selected>[ Pilih Siswa ]</option>
          <?php
    $sql="select*from siswa where kd_kelas='".$_POST['cmbkelas']."'";
    $qry = @mysql_query($sql,$koneksi)
        or die ("gagal query");
    while ($data =mysql_fetch_array($qry)){
        if ($data[kd_siswa]==$datasiswa){
            $cek="selected";
        }
    else{
        $cek="";
    }
    echo "<option value='$data[kd_siswa]'$cek>
            $data[nama]</option>";
		}
	?>
        </select>
      </td>
	  <td><select name="cmbmapel">
          <option value="notmapel" selected>[ Pilih Mapel ]</option>
          <?php
    $sql = "select*from mapel order by nama_mapel";
    $qry = @mysql_query($sql,$koneksi)
        or die ("gagal query");
    while ($data =mysql_fetch_array($qry)){
        if ($data[kd_mapel]==$datamapel){
            $cek="selected";
        }
    else{
        $cek="";
    }
    echo "<option value='$data[kd_mapel]'$cek>
            $data[nama_mapel]</option>";
    }
    ?>
        </select>
      </td>
      <td><input name="biji" type="text" value="<?php echo $data['biji'];?>" /></td>
	  <td>
			<input type="text" name="tanggal"  value="<?php if(empty($_POST['tgl'])){ 
			echo $tanggal;}else{ echo "$_POST[tgl]$_GET[tgl]"; }?>" size="11">
			<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.nilai.tanggal);return false;" >
			<img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="29" border="0" alt=""></a>
	</td>
    </tr>
    <?php
}
?>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" align="center"><input name="tbsimpan" type="submit" value="simpan" /></td>
    </tr>
  </table>
</form>