<?php


$posts = $postsControler->AllPosts();
	
echo "<h1 class='page-header'>Chapitres:</h1>";			
	foreach ($posts as $post){
		echo '<div class="row breadcrumb">';
		echo '<div class="col-sm-9">';
		echo '<h2>'. $post->title  .'</h2></a>';
		echo '<span>' . date("d/m/Y à H:i", strtotime($post->date)) .'</span>';
		echo '<p>' . $post->writer   .'</p>';
		echo '</div>';
		echo '<div class="col-sm-3"><br><br>';
		echo '<img src="img/'. $post->image .'" class="img-responsive thumbnail" width="100%"  alt="'. $post->title .'">';
		echo '<a href="index.php?p=post&id=' .  $post->id . '" class="btn btn-success btn-block">Accéder au chapitre</a>';
		echo '</div>';
		echo "</div>";


	}








