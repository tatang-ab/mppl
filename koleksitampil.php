<?php

/**
 * @author tatang
 * @copyright 2010
 */
session_start();
include_once "../librari/inc.session.php";
include_once "../librari/connectdb.php";

?>
<html>
<head>
<title>Daftar data koleksi buku</title>
<link href="../style/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="form1" method="post" action="koleksitampil.php">
<table width="618" border="0" cellpadding="2" cellspacing="1"
    bgcolor="#CCCCCC" class="keliling">
<tr>
    <td colspan="6" bgcolor="#CCFF33">
    <b>URUTKAN DATA</b></td>
</tr>
<tr>
    <td colspan="6" bgcolor="#CCFF99">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
        <td width="22%" align="right"><b>Kategori Buku :</b></td>
        <td width="78%"><select name="cmbkategori">
        <option value="" selected>[All Kategori]</option>
      <?php
$sql= "select*from buku_kategori order by kd_kategori";
$qry= @mysql_query($sql,$connect)
        or die ("gagal query");
while ($data=mysql_fetch_array($qry)){
    if ($data = mysql_fetch_array($qry)){
        $cek="selected";
    }
    else{
        $cek="";
    }
    echo "<option value='$data[kd_kategori]'$cek>
        $data[nm_kategori]</option>";
    }
?>
    </select>
     <input name="tbshow" type="submit" value="show">
     </td>
     </tr>
     </table></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="6" bgcolor="#CCFF33"><b>DAFTAR KOLEKSI BUKU</b></td>
    </tr>
    <tr>
        <td width="22" bgcolor="#CCFF99"><b>No</b></td>
        <td width="294" bgcolor="#CCFF99"><b>Judul Buku</b></td>
        <td width="69" align="center" bgcolor="#CCFF99"><strong>Gambar</strong></td>
        <td width="63" align="center" bgcolor="#CCFF99"><strong>Harga</strong></td>
        <td width="59" align="center" bgcolor="#CCFF99"><strong>Jumlah</strong></td>
        <td width="90" align="center" bgcolor="#CCFF99"><strong>operasi</strong></td>
    </tr>
<?php
if (! trim ($_POST['cmbkategori'])==""){
    $sql="select*from buku_koleksi where kd_kategori='".$_POST['cmbkategori']."'";
}
else{
    $sql="select*from buku_koleksi order by kd_koleksi";
}
$qry=mysql_query($sql,$connect)
        or die ("gagal berita");
while ($data=mysql_fetch_array($qry)){
    $no++;
?>
<tr bgcolor="#FFFFFF">
    <td align="center"><?php echo $no;?></td>
    <td><?php echo $data['judul_buku'];?></td>
    <td align="center">
    <img src="../imgbuku/<?php echo $data['file_gambar'];?>" width="44" height="54">
    </td>
    <td align="right">
    <?php echo number_format($data['harga'],0,",",".");?></td>
    <td align="right"><?php echo $dta['stok'];?></td>
    <td align="center">
    <a href="koleksiubahfm.php?kdbuku=<?php echo $data['kd_koleksi'];?>">Ubah</a> I 
    <a href="koleksihapus.php?kdbuku=<?php echo $data['kd_koleksi'];?>">Hapus</a></td>
</tr>
<?php
}
?>
</table>
</form>
</body>
</html>