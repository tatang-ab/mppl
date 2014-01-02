<?php 
	include "conn.php";
	$kd_kelas=$_GET['kd_kelas'];
	$query=mysql_fetch_array(mysql_query("select * from kelas where kd_kelas='$kd_kelas'"));
?>
<div class="post">
	<h2 class="title"><a href="#">INPUT NILAI SISWA <?php echo $query['nama_kelas'];?></a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<form action="?page=nilaisim" method="post" name="postform">
		<input type="hidden" value="<?php echo $query['kd_kelas'];?>" name="kd_kelas"/>
		<table class="datatable">
          <tr>
            <td width="24%" align="left" colspan="6">Tanggal :
            <input type="text" name="tanggal"  value="<?php if(empty($_POST['tgl'])){ echo $tanggal;}
			else{ echo "$_POST[tgl]$_GET[tgl]"; }?>" size="11" />
            <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal);return false;" >
			<img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="29" border="0" alt="" /></a>
			Mapel : 
			<select name="cmbmapel">
        <option value="notmapel" selected>[ mapel ]</option>
    <?php
    $sql="select*from mapel order by kd_mapel";
    $qry= @mysql_query($sql, $koneksi)
            or die ("gagal query");
    while ($data= mysql_fetch_array($qry)){
        if ($data[kd_mapel]==$datamapel){
            $cek="selected";
        }
        else{
            $cek="";
        }
        echo "<option value='$data[kd_mapel]' $cek>$data[nama_mapel]</option>";
    }
    ?></select></td>
          </tr>
          <tr>
            <th>No</th>
            <th>Nama</th>
			<th>Siswa</th>
			<th>Biji</th>
            <th>Fisika</th>
            <th>Bahasa</th>
            <th>Ekonomi</th>
          </tr>
          <?php
		//penting nech buat kasih nilai awal cekbox
		$no=0;
		$query=mysql_query("select * from siswa where kd_kelas='$kd_kelas'");
		while($row=mysql_fetch_array($query)){
		?>
          <tr>
            <td><?php echo $c=$c+1;?></td>
            <td><?php echo $row['nama'];?></td>
			<td><?php echo $row['kd_siswa'];?></td>
			<td><input name="biji" type="text" value="<?php echo "$biji"; ?>" maxlength="3"></td>
            <td align="center"><input name="fisika" type="text" value="<?php "$fisika"; ?>" maxlength="3"/></td>
            <td align="center"><input name="bahasa" type="text" value="<?php "$bahasa"; ?>" maxlength="3"/></td>
            <td align="center"><input name="ekonomi" type="text" value="<?php "$ekonomi"; ?>" maxlength="3"/></td>
          </tr>
          <?php
		}
		?>
        </table>
		<br />
		<input type="checkbox" name="selesai" value="yes" />Tandai Kelas Selesai<br /><br />
		<input type="submit" value="Submit" />
		</form>
		</p>
  </div>
</div>

<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
