<h1>Update Nilai</h1>

<form method="post" action="update.php">
<table border="1">
<tr><td width="20">No</td>
<td width="31">kd_siswa</td>
<td width="28">Nilai</td>
<td>kelas</td>
</tr>
 
<?php
include "conn.php";
 
// membaca kode matakuliah yang disubmit dari formnilai.php
$kodeMK = $_POST['mapel'];

// menampilkan data nim dan nilai mahasiswa yang mengambil matakuliah berdasarkan kode MK
$query = "SELECT kd_siswa, biji, kd_kelas FROM nilai WHERE kd_mapel = '$kodeMK'";

$hasil = mysql_query($query);
 
// inisialisasi counter
$i = 1;
while ($data = mysql_fetch_array($hasil))
{
echo "<tr><td>".$i."</td><td>".$data['kd_siswa']."</td><td><input type='hidden' name='siswa".$i."' value='".$data['kd_siswa']."' />
<input type='text' name='nilai".$i."' value='".$data['nilai']."' /></td>
<td><input type='text'  name='kelas".$i."' value='".$data['kd_kelas']."' /></td>
</tr>";
$i++;
}
$jumMhs = $i-1;
?>
</table><br />
<input type="hidden" name="n" value="<?php echo $jumMhs ?>" />
<input type="hidden" name="kodemk" value="<?php echo $kodeMK;?>">
<input type="submit" value="Update" name="submit" />
</form>