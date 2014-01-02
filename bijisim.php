<?php

if ($_POST['tbsimpan']){
        //perintah simpan data
        include_once "conn.php";
        $sql= "insert into nilai set 
            kd_siswa ='$cmbsiswa',
            kd_kelas='$cmbkelas',
			biji='$biji',
            kd_mapel ='$cmbmapel',
			tgl='$tanggal'";
            
        mysql_query($sql,$koneksi)
            or die ("gagal query simpan".mysql_error());
            
        echo "semua benar,proses simpan berhasil";
}
else {
    echo "GAGAL";
    exit;
}
?>