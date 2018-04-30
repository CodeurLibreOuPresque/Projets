<?php
	echo "<h1 class='page-header'> Commentaire à modérer</h1>";
	echo "<table class='table table-responsive'>";			
	foreach ($commentsControler->AllCommentsNotSeen() as $comment){

		echo "<tr class='active'> <td>";
		echo '<h4>'. $comment->name    .'</h4><span class="label label-warning">' . date("d/m/Y à H:i", strtotime($comment->date)) .'</span>';
		echo '<span class="label label-primary">' . $comment->email   .'</span>';
		echo '<br><br><p>' . substr($comment->comment, 0, 75) .'</p>';
		echo '<p> concerne le post ' . $comment->post_id . '</p>';
		echo "<div class='btn-group btn-group-sm'>";
		echo '<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal'.$comment->id.'">
  				Consulter
			</button>
			<div class="modal fade" id="myModal'.$comment->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
	    			<div class="modal-content">
			      			<div class="modal-header">
			        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        			<h4>'. $comment->name    .'</h4><span>' . date("d/m/Y à H:i", strtotime($comment->date)) .'</span>
			        			<p>' . $comment->email   .'</p>
			      			</div>
	      					<div class="modal-body">
	      					'.$comment->comment.'
						    </div>
						    <div class="modal-footer">
						      	<a href="index.php?p=action&method=deleteComment&id='. $comment->id .'" class="btn btn-danger">Supprimer</a>
								<a href="index.php?p=action&method=seenToOne&id='. $comment->id .'" class="btn btn-success">Accepter</a>
						    </div>
	    			</div>
  				</div>
			</div>';
		echo '<a href="index.php?p=action&method=deleteComment&id='. $comment->id .'" class="btn btn-danger">Supprimer</a>';
		echo '<a href="index.php?p=action&method=seenToOne&id='. $comment->id .'" class="btn btn-success">Accepter</a>';
		echo "</div>";
		echo "</td></tr>";
			
	}
echo "</table>";

?>

