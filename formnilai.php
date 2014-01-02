<?php
// koneksi ke mysql
include "conn.php";
?>

<form method="post" action="submit.php">
Pilih Mata Kuliah :
<select name="mapel">
<?php
// query untuk menampilkan semua matakuliah dari tabel 'mk'
$query = "SELECT * FROM mapel";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
echo "<option value='".$data['kd_mapel']."'>".$data['nama_mapel']."</option>";
}
?>
</select>
<input type="submit" value="Submit" name="submit" />
</form>