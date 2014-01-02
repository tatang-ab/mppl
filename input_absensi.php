<?php 
	include "conn.php";
	$kd_kelas=$_GET['kd_kelas'];
	$query=mysql_fetch_array(mysql_query("select * from kelas where kd_kelas='$kd_kelas'"));
?>
<div class="post">
	<h2 class="title"><a href="#">ABSENSI KELAS <?php echo $query['nama_kelas'];?></a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<form action="?page=proses" method="post" name="postform">
		<input type="hidden" value="<?php echo $query['kd_kelas'];?>" name="kd_kelas"/>
		<table class="datatable">
		<tr>
			<td width="24%" align="left" colspan="6">Tanggal : 
			<input type="text" name="tanggal"  value="<?php if(empty($_POST['tgl'])){ 
			echo $tanggal;}else{ echo "$_POST[tgl]$_GET[tgl]"; }?>" size="11">
			<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal);return false;" >
			<img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="29" border="0" alt=""></a></td>
		</tr>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Hadir (H)</th>
			<th>Sakit (S)</th>
			<th>Ijin (I)</th>
			<th>Alfa (A)</th>
		</tr>
		<?php
		//penting nech buat kasih nilai awal cekbox
		$no=0;
		
		$query=mysql_query("select * from siswa where kd_kelas='$kd_kelas'");
		while($row=mysql_fetch_array($query)){
		?>
		<tr>
			<td><?php echo $c=$c+1;?></td><td><?php echo $row['nama'];?></td>
			<td align="center">
				<?php
				echo "<input type=checkbox name=hadir[] value=$row[kd_siswa] id='$no'>";
				$no++;
				?>
			</td>
			<td align="center">
				<?php
				echo "<input type=checkbox name=sakit[] value=$row[kd_siswa] id=$no>";
				$no++;
				?>
			</td>
			<td align="center">
				<?php
				echo "<input type=checkbox name=ijin[] value=$row[kd_siswa] id=$no>";
				$no++;
				?>
			</td>
			<td align="center">
				<?php
				echo "<input type=checkbox name=alfa[] value=$row[kd_siswa] id=$no>";
				$no++;
				?>
			</td>
		</tr>
		<?php
		}
		
		echo "
			<tr>
				<td></td>
				<td></td>
				<td align=center>
				<input type='button' name='pilih' onclick='for (i=0;i<$no;i++){document.getElementById(i).checked=true;}' value='Check All'>
				</td>
				<td align=center>
				<input type='button' name='pilih' onclick='for (i=0;i<$no;i++){document.getElementById(i).checked=false;}' value='Uncheck All'>
				</td>
				<td></td>
				<td></td>
			</tr>";
		?>
		</table>
		<br />
		<input type="checkbox" name="selesai" value="yes" />Tandai Jam Kelas Telah Selesai
		<br /><br />
		<input type="submit" value="Submit" />
		</form>
		</p>
  </div>
</div>

<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
