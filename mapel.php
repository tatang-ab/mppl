<?php
 error_reporting (~E_NOTICE);
include "conn.php";
include_once "cek_session.php";
include_once "inc.librari.php";
 ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Kelas</a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		
		<form action="?page=mapel" method="post">
		<table>
		<tr>
			<td>Kode Mapel : </td>
			<td><input name="TxtKode" type="text" size="3" value="<?php echo kdauto("mapel","M"); ?>" disabled>
        	<input name="TxtKodeH" type="hidden" value="<?php echo kdauto("mapel","M"); ?>"></td>
			<td>Nama Mata Pelajaran </td>
			<td><input type="text" size="20" name="nama_mapel" /></td>
			<td><input type="submit" value="Simpan" /></td>
		</tr>
		<tr>
		</tr>
		</table>
		</form>
		
		<?php 

		
		//untuk input
		if(isset($_POST['nama_mapel'])){
			$TxtKodeH= $_POST['TxtKodeH'];
			$nama_mapel=strtoupper($_POST['nama_mapel']);
			
			$query=mysql_query("insert into mapel(kd_mapel,nama_mapel) values('$TxtKodeH','$nama_mapel')",$koneksi);
			
			if($query){
				echo "<br>";
				echo "Berhasil";
			}else{
				echo "gagal";
				echo mysql_error();
			} 
		}else{
			unset($_POST['kd_mapel']);
			unset($_POST['nama_mapel']);
		}
		
		//untuk menampilkan
		$view=mysql_query("select * from mapel order by kd_mapel asc");
		?>
		<br />
		<table class="datatable">
		<tr><th>Nomor</th><th>Kode Mapel</th><th>Nama Mapel</th></tr>
		<?php
		while($row=mysql_fetch_array($view)){
		?>
		<tr>
		<td><?php echo $c=$c+1;?></td>
		<td><?php echo $row['kd_mapel']; ?></td>
		<td><?php echo $row['nama_mapel'];?></td>
		</tr>
		<?php
		}
		?>
		</table>
				
		</p>
  	</div>
</div>


