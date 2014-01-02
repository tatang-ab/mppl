<?php 
include "conn.php";
$kd_siswa=$_POST['kd_siswa'];
$kd_kelas=$_POST['kd_kelas'];
$cmbmapel = $_POST['cmbmapel'];
$tanggal=$_POST['tanggal'];
$fisika=$_POST['fisika'];

if(isset($_POST['selesai'])){
	$sql = "insert into nilai(kd_siswa,kd_kelas,biji,kd_mapel,fisika,bahasa,ekonomi,tanggal,selesai) 
			values('$kd_siswa','$kd_kelas','$biji','$cmbmapel','$fisika','$bahasa','$ekonomi','$tanggal','yes')";
	$query = mysql_query($sql,$koneksi);
			}
		?>
		<script language="javascript">
		document.location.href="?page=view_nilai&kd_kelas=<?php echo $kd_kelas;?>&tanggal=<?php echo $tanggal;?>";
		</script>


