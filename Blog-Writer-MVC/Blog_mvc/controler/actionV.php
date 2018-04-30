<?php

// index.php?p=action&method=...&id=...
if(isset($_GET['id']) && isset($_GET['method']) && isset($_GET['p'])){
	//modifier la valeur seen dans comment  1 OU 0
	if($_GET['method'] == 'seentozero'){
		$commentsControler->seenToZero($_GET['id']);
	}
	?>
	<script>
    window.location.replace("index.php?p=post&id=" + <?php echo $_GET['postid'] ?>);
	</script>
	<?php
}else{
	echo 'Ne reconnait pas tous les arguments';
}

?>


