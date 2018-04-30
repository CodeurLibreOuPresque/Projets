<?php 

if(!empty($_GET['id'])){
	$db->exec("DELETE FROM posts WHERE id = '{$_GET['id']}'");
	header("Location:index.php?page=list");
}
else{
	alert('Cette annonce n\'existe pas' );
}


?>