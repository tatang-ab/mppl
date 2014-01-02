<?php
 error_reporting (~E_NOTICE);
 include "cek_session.php"; ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Absensi</a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<table class="datatable">
		<tr>
			<th>No</th><th>Nama Kelas</th><th>Jumlah Siswa</th><th>Aksi</th>
		</tr>
		<?php 
		include "conn.php";
		$kelas=mysql_query("select * from kelas order by nama_kelas asc",$koneksi);
		
		//untuk mencari jumlah
		echo "Jumlah Kelas : ".$jumlah_kelas=mysql_num_rows($kelas);
		echo " >> Jumlah Siswa : ".$jumlah_siswa=mysql_num_rows(mysql_query("select * from siswa",$koneksi));
		echo "<br><br>";
		
		while($row=mysql_fetch_array($kelas)){
			//mencari jumlah siswa di masing-masing kelas
			$siswa=mysql_query("select * from siswa where kd_kelas='$row[kd_kelas]'",$koneksi);
			$jumlah=mysql_num_rows($siswa);
			?>
			<tr>
				<td align="center"><?php echo $c=$c+1; ?></td>
				<td align="center"><?php echo $row['nama_kelas']; ?></td><td align="center"><?php echo $jumlah;?> Orang</td>
				<td align="center"><a href="?page=input_absensi&kd_kelas=<?php echo $row['kd_kelas'];?>">Absensi</a></td>
			</tr>
			<?php
		}
		?>
		</table>
		</p>
  </div>
</div>

