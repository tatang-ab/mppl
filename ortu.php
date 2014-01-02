<?php 
 error_reporting (~E_NOTICE);
include "cek_session.php"; ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Orangtua</a></h2>
	<p class="meta"><em>Sunday, April 26, 2009 7:27 AM Posted by <a href="#">Someone</a></em></p>
	<div class="entry">
		<p>
		<form name="ortu" action="?page=ortu" method="post">
		<table>
		<tr>
			<td>Nama</td><td><input type="text" size="20" name="nama" /></td>
		</tr>
		<tr>
			<td>Tgl Lahir</td><td><input type="text" size="20" name="tgl" title="dd-mm-yyyy" />
			<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.ortu.tgl);return false;" >
			<img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
		</tr>
		<tr>
			<td>Alamat</td><td><textarea cols="20" rows="5" name="alamat"></textarea></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" value="Simpan" /></td>
		</tr>
		</table>
		</form>
		
		<?php 
		include "conn.php";
		//untuk input
		if(isset($_POST['nama'])){
			$nama=ucwords($_POST['nama']);
			$tgl=$_POST['tgl'];
			$alamat=$_POST['alamat'];
			
			$query=mysql_query("insert into ortu(nama, tgl_lahir, alamat) values('$nama','$tgl','$alamat')",$koneksi);
			while($row=mysql_fetch_array($query));
			
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
		$view=mysql_query("select * from ortu order by kd_ortu asc");
		?>
		<br />
		<table class="datatable">
		<tr><th>No</th><th>Nama</th><th>Tgl Lahir</th><th>Alamat</th></tr>
		<?php
		while($row=mysql_fetch_array($view)){
		?>
		<tr><td><?php echo $c=$c+1;?></td><td><?php echo $row['nama'];?></td>
		<td><?php echo $row['tgl_lahir'];?></td>
		<td><?php echo $row['alamat'];?></td></tr>
		<?php
		}
		?>
		</table>
		
		</p>
	</div>
</div>

<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>