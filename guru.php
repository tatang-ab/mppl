<?php 
 error_reporting (~E_NOTICE);
include "cek_session.php"; ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Guru</a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<form name="guru" action="?page=guru" method="post">
		<table>
		<tr>
			<td>Nama</td><td><input type="text" size="20" name="nama" /></td>
		</tr>
		<tr>
			<td>Tgl Lahir</td><td><input type="text" size="20" name="tgl" title="dd-mm-yyyy" />
			<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.guru.tgl);return false;" >
			<img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
		</tr>
		<tr>
			<td>Alamat</td><td><textarea cols="20" rows="5" name="alamat"></textarea></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
			<select name="mapel">
			<option value="0" selected="selected">Pilih Mapel yang Diajar</option>
			<?php 
			include "conn.php";
			
			$query=mysql_query("select * from mapel order by nama_mapel asc",$koneksi);
			
			while($row=mysql_fetch_array($query))
			{
				?><option value="<?php  echo $row['kd_mapel']; ?>"><?php  echo $row['nama_mapel']; ?></option><?php 
			}
			?>
			</select>	
			</td>
		</tr>
		<tr>
			<td></td><td><input type="submit" value="Simpan" /></td>
		</tr>
		</table>
		</form>
		
		<?php 
		//untuk input
		if(isset($_POST['nama'])){
			$nama=ucwords($_POST['nama']);
			$tgl=$_POST['tgl'];
			$alamat=$_POST['alamat'];
			$kd_mapel=$_POST['mapel'];
			
			$query=mysql_query("insert into guru(nama, tgl_lahir, alamat, kd_mapel) 
							values('$nama','$tgl','$alamat','$kd_mapel')",$koneksi);
			
			if($query){
				echo "<br>";
				echo "Berhasil";
			}else{
				echo "gagal";
				echo mysql_error();
			} 
		}else{
			unset($_POST['nama']);
		}
		
		//untuk menampilkan
		$view=mysql_query("select * from guru order by kd_mapel asc");
		?>
		<br />
		<table class="datatable">
		<tr><th>No</th><th>Nama</th><th>Tgl Lahir</th><th>Alamat</th><th>Mapel yang Diajar</th></tr>
		<?php
		while($row=mysql_fetch_array($view)){
		$nama_kls=mysql_fetch_array(mysql_query("SELECT nama_mapel FROM mapel WHERE kd_mapel='$row[kd_mapel]'"));	
		?>
		<tr><td><?php echo $c=$c+1;?></td><td><?php echo $row['nama'];?></td><td><?php echo $row['tgl_lahir'];?></td>
		<td><?php echo $row['alamat'];?></td>
		<td><?php echo $nama_kls['nama_mapel'];?></td></tr>
		<?php
		}
		?>
		</table>
		
		</p>
	</div>
</div>

<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>