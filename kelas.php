<?php
 error_reporting (~E_NOTICE);
include "cek_session.php"; ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Kelas</a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		
		<form action="?page=kelas" method="post">
		<table>
		<tr>
			<td>Nama Kelas</td><td><input type="text" size="20" name="nama_kelas" /></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" value="Simpan" /></td>
		</tr>
		</table>
		</form>
		
		<?php 
		include "conn.php";
		
		//untuk input
		if(isset($_POST['nama_kelas'])){
			$nama_kelas=strtoupper($_POST['nama_kelas']);
			
			$query=mysql_query("insert into kelas(nama_kelas) values('$nama_kelas')",$koneksi);
			
			if($query){
				echo "<br>";
				echo "Berhasil";
			}else{
				echo "gagal";
				echo mysql_error();
			} 
		}else{
			unset($_POST['nama_kelas']);
		}
		
		//untuk menampilkan
		$view=mysql_query("select * from kelas order by nama_kelas asc");
		?>
		<br />
		<table class="datatable">
		<tr><th>Kode Kelas</th><th>Nama Kelas</th><th>Jumlah Siswa</th></tr>
		<?php
		while($row=mysql_fetch_array($view)){
		$siswa=mysql_query("select * from siswa where kd_kelas='$row[kd_kelas]'",$koneksi);
			$jumlah=mysql_num_rows($siswa);
		?>
		<tr><td><?php echo $c=$c+1;?></td>
		<td><?php echo $row['nama_kelas'];?></td>
		<td align="center"><?php echo $jumlah;?> Orang</td></tr>
		<?php
		}
		?>
		</table>
				
		</p>
  	</div>
</div>


