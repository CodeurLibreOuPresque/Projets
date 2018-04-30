<?php


$posts = $postsControler->AllPosts('AllPosts');

	foreach ($posts as $post){
		echo '<div class="row breadcrumb">';
			echo '<div class="col-sm-9">';
				echo '<h2>'. $post->title  .'</h2></a>';
				if(!($post->posted)){
							echo '<span class="glyphicon glyphicon-lock btn-lg" aria-hidden="true"></span>';
						}
					echo '<div>';
							echo '<span  class="label label-default">' . date("d/m/Y à H:i", strtotime($post->date)) .'</span>
								<span  class="label label-default">' . $post->writer   .'</span>';

					echo "</div>";
			echo '</div><br><br>';
			echo "<div class='col-sm-3'>";
				echo '<img src="../img/'. $post->image .'" class="img-responsive thumbnail" width="100%"  alt="'. $post->title .'">';
				echo "<div class='btn-group-vertical btn-block'>";
					echo '<a href="index.php?p=post&id=' .  $post->id . '" class="btn btn-success">
					Modifer</a>'; 			
					echo "<a href='index.php?p=action&method=deletePost&id=".$post->id."'class='btn btn-danger'>Supprimer</a>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}

?>





