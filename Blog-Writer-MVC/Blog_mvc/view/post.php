<?php


$posts = $postsControler->AllPosts();
$find = false;
if(isset($_GET['id'])){
		foreach ($posts as $post){

			if($_GET['id'] == $post->id){
						
						
						echo '</div> <div class="container-fluid">
    							<div>
							        <img src="img/'. $post->image .'" alt="'. $post->title .'" class="img-rounded" height="300px" width="100%"/>
							    </div>
							</div>
							<div class="container">';
  						echo '<span  class="label label-default">' . date("d/m/Y à H:i", strtotime($post->date)) .'</span>
							  <span  class="label label-default">' . $post->writer   .'</span>';
						echo '<h1 class="well">'. $post->title . '</h1>';	
						echo '<div class="well">';	
						echo '<p>'. htmlspecialchars_decode($post->content) .'</p>';
						echo "</div>";
						$find = true;



				if(isset($_POST['submit'])){
						$_POST['id'] = $_GET['id'];
						if(!empty($commentsControler->verif($_POST))){
							echo '<div style="border:solid 6px red">';

								foreach ($commentsControler->verif($_POST) as $key => $value) {
									echo '<h5>' . $value . '</h5>';
								}

							echo '</div>';
						}else{
							?>
							<script>
				                window.location.replace("index.php?p=post&id=" + <?= $post->id?>);
				            </script>
				            <?php
						}
				}

	?>
		
	<h2>Votre commentaire</h2>
	<form method="POST">
		<div class="form-group">
			<label for="name">Votre nom ou pseudo</label>
			<input type="text" name="name" class="form-control" id="name">
		</div>
		<div class="form-group" >
			<label for="email">Votre adresse e-mail</label>
			<input type="email" name="email" class="form-control" id="email">
		</div>
		<div class="form-group">
  			<label for="comment">Comment:</label>
  			<textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
		</div>
		<div>	
			<input type="submit" name="submit" class="btn btn-warning">
		</div><br>

	</form>
<?php
			echo "<table class='table table-responsive'>";
			foreach ($commentsControler->commentsByPostId($_GET['id']) as $comment){
				echo "<tr class='active'> <td>";
				echo '<h4>'. $comment->name    .'</h4><span>' . date("d/m/Y à H:i", strtotime($comment->date)) .'</span>';
				if($comment->seen == 1){
				?>
				<a href="index.php?p=action&method=seentozero&id=<?=$comment->id?>&postid=<?=$_GET['id']?>" title="Signaler un abus" class="glyphicon glyphicon-warning-sign"></a>
				<?php
				}	
				echo '<p>' . $comment->email   .'</p>';
				echo '<p>' . $comment->comment .'</p>';
				echo "</td></tr>";
			}
			echo "</table>";
		}
	}
			if($find == false){
				echo '<h1>Ce post n\'existe pas ou plus</h1>';
			}
}else{
	echo '<h1>Ce post n\'existe pas ou plus</h1>';
}

?>
	