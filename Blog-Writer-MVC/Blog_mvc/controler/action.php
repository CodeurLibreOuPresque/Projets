<?php

// index.php?p=action&method=...&id=...
if(isset($_GET['id']) && isset($_GET['method']) && isset($_GET['p'])){
	//modifier la valeur seen dans comment  1 OU 0
	if($_GET['method'] == 'seenToOne'){
		$commentsControler->seenToOne($_GET['id']);
		?>
		<script>
    		window.location.replace("index.php?p=dashboard");
		</script>
		<?php
	}

	else if($_GET['method'] == 'deletePost'){
		$postsControler->deletePost($_GET['id']);
		?>
		<script>
    		window.location.replace("index.php?p=liste");
		</script>
		<?php
	}

	else if($_GET['method'] == 'deleteComment'){
		$commentsControler->deleteComment($_GET['id']);
		?>
		<script>
    		window.location.replace("index.php?p=dashboard");
		</script>
		<?php
	}

	else if($_GET['method'] == 'sessionDestroy'){
		$adminsControler->sessionDestroy();
		?>
		<script>
    		window.location.replace("index.php?p=dashboard");
		</script>
		<?php
	}		
}else{
	echo 'Ne reconnait pas tous les arguments';
}




?>