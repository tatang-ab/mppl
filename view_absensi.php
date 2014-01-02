<?php
 error_reporting (~E_NOTICE);
 include "conn.php";
$kd_kelas=$_GET['kd_kelas'];
$query=mysql_fetch_array(mysql_query("select * from kelas where kd_kelas='$kd_kelas'"));

?>
<div class="post">
	<h2 class="title"><a href="#">VIEW ABSENSI KELAS <?php echo $query['nama_kelas'];?></a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<table class="datatable">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Hadir (H)</th>
			<th>Sakit (S)</th>
			<th>Ijin (I)</th>
			<th>Alfa (A)</th>
		</tr>
		<?php
		$kd_kelas=$_GET['kd_kelas'];
		$tanggal=$_GET['tanggal'];
		
		$query=mysql_query("select * from absensi where kd_kelas='$kd_kelas' and tanggal='$tanggal'",$koneksi);
		
		while($row=mysql_fetch_array($query)){
			$siswa=mysql_fetch_array(mysql_query("select * from siswa where kd_siswa='$row[kd_siswa]'",$koneksi));
			$keterangan=$row['keterangan'];
			?>
			<tr>
				<td><?php echo $c=$c+1;?></td>
				<td><?php echo $siswa['nama'];?></td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from absensi where kd_siswa='$row[kd_siswa]' and tanggal='$tanggal' and keterangan='h'",$koneksi);
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from absensi where kd_siswa='$row[kd_siswa]' and tanggal='$tanggal' and keterangan='s'",$koneksi);
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from absensi where kd_siswa='$row[kd_siswa]' and tanggal='$tanggal' and keterangan='i'",$koneksi);
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from absensi where kd_siswa='$row[kd_siswa]' and tanggal='$tanggal' and keterangan='a'",$koneksi);
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
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