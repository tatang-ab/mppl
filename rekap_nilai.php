<?php include "conn.php";?>
<div class="post">
	<h2 class="title"><a href="#"> REKAP NILAI <?php echo $query['nama_kelas'];?></a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<form action="?page=rekap_nilai" method="post" name="postform">
		<table width="99%" border="0" class="datatable">
		<tr>
			<td width="6%" align="left"> <div align="left">Tanggal</div></td>
		  <td width="24%" align="left"><input type="text" name="tgl1"  value="<?php if(empty($_POST['tgl'])){ echo $tanggal;}else{ echo "$_POST[tgl]$_GET[tgl]"; }?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl1);return false;" >
		  <img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="29" border="0" alt=""></a></td>
		  <td width="18%" align="left"><div align="right">s/d Tanggal</div></td>
			<td width="28%" align="left"><input type="text" name="tgl2"  value="<?php if(empty($_POST['tgl'])){ echo $tanggal;}else{ echo "$_POST[tgl]$_GET[tgl]"; }?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl2);return false;" >
			<img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="29" border="0" alt=""></a></td>
			<td width="24%">
			<select name="kelas">
			<option value="0" selected="selected">Pilih Kelas</option>
			<?php 
			
			$query=mysql_query("select * from kelas order by nama_kelas asc",$koneksi);
			
			while($row=mysql_fetch_array($query))
			{
				?><option value="<?php echo $row['kd_kelas']; ?>"><?php  echo $row['nama_kelas']; ?></option>
				<?php 
			}
			?>
			</select>	
		  </td>
		</tr>
		<tr><td colspan="5" align="left"><input type="submit" value="Tampilkan"></td></tr>
		</table>	
		</form>	
		<br /><br />
		<table class="datatable">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Fisika</th>
			<th>Ekonomi</th>
			<th>Bahasa</th>
		</tr>
		<?php
		//untuk option
		$tanggal1=$_POST['tgl1'];
		$tanggal2=$_POST['tgl2'];
		$kelas=$_POST['kelas'];
		
		$query=mysql_query("select distinct kd_siswa from nilai where kd_kelas='$kelas' and tgl between '$tanggal1' and '$tanggal2' order by tgl desc",$koneksi);
	
		
		while($row=mysql_fetch_array($query)){
			$siswa=mysql_fetch_array(mysql_query("select * from siswa where kd_siswa='$row[kd_siswa]'",$koneksi));
			$mapel=$row['kd_mapel'];
			?>
			<tr>
				<td><?php echo $c=$c+1;?></td>
				<td><?php echo $siswa['nama'];?></td>
				<td align="center">
				<?php
					$sql="select * from nilai where kd_siswa='$row[kd_siswa]' and kd_mapel='M01' and tgl between '$tanggal1' and '$tanggal2' order by tgl desc";
					$qry=mysql_query($sql,$koneksi)
        or die ("gagal berita");
while ($data=mysql_fetch_array($qry)){
				?>
				<?php echo $data['biji'];?>
				</td>
				<?php
				}
				?>
				</td>
				<td align="center">
				<?php
					$sql="select * from nilai where kd_siswa='$row[kd_siswa]' and kd_mapel='M02' and tgl between '$tanggal1' and '$tanggal2' order by tgl desc";
					$qry=mysql_query($sql,$koneksi)
        or die ("gagal berita");
while ($data=mysql_fetch_array($qry)){
				?>
				<?php echo $data['biji'];?>
				</td>
				<?php
				}
				?>
				</td>
				<td align="center">
				<?php
					$sql="select * from nilai where kd_siswa='$row[kd_siswa]' and kd_mapel='M03' and tgl between '$tanggal1' and '$tanggal2' order by tgl desc";
					$qry=mysql_query($sql,$koneksi)
        or die ("gagal berita");
while ($data=mysql_fetch_array($qry)){
				?>
				<?php echo $data['biji'];?>
				</td>
				<?php
				}
				?>
				</td>
				
			</tr>
			<?php
			
		}
		?>
		</table>
  </div>
</div>

<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>