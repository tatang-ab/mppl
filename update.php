<?php
include "conn.php";

// membaca jumlah mahasiswa (n) dari submit.php
$jumMhs = $_POST['n'];
 
// membaca kode MK yang akan diupdate
$kodeMK = $_POST['kd_mapel'];

// proses looping untuk membaca nilai dan nim mahasiswa dari form, serta menjalankan query update
for ($i=1; $i<=$n; $i++)
{
// membaca nim mahasiswa ke-i, i = 1, 2, 3, ..., n
$nimMhs = $_POST['siswa'.$i];
$kelas = $_POST['kelas'.$i];
 
// membaca nilai mahasiswa ke-i, i = 1, 2, 3, ..., n
$nilai  = $_POST['nilai'.$i];
 
// update nilai mahasiswa ke-i, i = 1, 2, 3, ..., n
$query = "update nilai SET biji = $nilai WHERE kd_siswa = '$nimMhs' AND kd_mapel = '$kodeMK' AND kd_kelas='$kelas'";
mysql_query($query,$koneksi);
}

echo "<h2>Update nilai sukses</h2>";
 
?>