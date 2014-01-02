<?php  session_start();
if (session_is_registered('id'))
{
	session_unregister("id");
	session_unregister("user_name");
	//session_destroy();
	?><script language="javascript">
	document.location="index.php";
	</script><?php 
	
}else{
	?><script language="javascript">
	alert("Maaf, Anda tidak berhak mengakses halaman ini!!");
	document.location="index.php";
	</script>
	<?php 
}
?>