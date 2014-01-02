<?php  session_start();
if (session_is_registered('id'))
{	
}else{
	?><script language="javascript">
	alert("Maaf, Anda tidak berhak mengakses halaman ini!!");
	document.location="index.php";
	</script>
	<?php 
}
?>