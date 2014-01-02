<?php
 error_reporting (~E_NOTICE);
 include "conn.php";
$kd_kelas=$_GET['kd_kelas'];
$query=mysql_fetch_array(mysql_query("select * from kelas where kd_kelas='$kd_kelas'"));

?>
<div class="post">
	<h2 class="title"><a href="#">VIEW DATA NILAI <?php echo $query['nama_kelas'];?></a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<table class="datatable">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Fisika</th>
			<th>Bahasa</th>
			<th>Ekonomi</th>
		</tr>
		<?php
		$kd_kelas=$_GET['kd_kelas'];
		$tanggal=$_GET['tanggal'];
		
		$query=mysql_query("select * from nilai where kd_kelas='$kd_kelas' and tanggal='$tanggal'",$koneksi);
		
		while($row=mysql_fetch_array($query)){
			$siswa=mysql_fetch_array(mysql_query("select * from siswa where kd_siswa='$row[kd_siswa]'",$koneksi));
			$keterangan=$row['keterangan'];
			?>
			<tr>
				<td><?php echo $c=$c+1;?></td>
				<td><?php echo $siswa['nama'];?></td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from nilai where kd_siswa='$row[kd_siswa]' and tanggal='$tanggal'",$koneksi);
					$fisika=mysql_fetch_array($hadir);
					echo $fisika;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from nilai where kd_siswa='$row[kd_siswa]' and tanggal='$tanggal'",$koneksi);
					$bahasa=mysql_fetch_array($hadir);
					echo $bahasa;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from nilai where kd_siswa='$row[kd_siswa]' and tanggal='$tanggal'",$koneksi);
					$ekonomi=mysql_fetch_array($hadir);
					echo $ekonomi;
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