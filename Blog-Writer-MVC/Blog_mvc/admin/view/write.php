<?php
$posts = $postsControler->AllPosts('AllPosts');


			if(isset($_POST['submit'])){
				if(!empty($postsControler->writeVerif($_POST, $_FILES))){
					echo '<ol class="breadcrumb well">';

						foreach ($postsControler->writeVerif($_POST, $_FILES) as $key => $value) {
							echo '<li>' . $value . '</li>';
						}

					echo '</ol>';
				}else{
					?>
					<script>
		                window.location.replace("index.php?p=liste");
		            </script>
		            <?php
				}
			}

	
?>



<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group">
        	<label for="title">Titre de l'article</label><br/>
            <input type="text" name="title" id="title" class="form-control"/>   
        </div>
        <div class="form-group">
	        <label for="content">Contenu de l'article</label><br/>         
	        <textarea id="content" name="content" cols="100%" rows="20px" class="form-control tinymce"></textarea> 
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="public"/>
         		<p>Public</p>
            </label>
        </div>     
        <div class="form-group">
            <label for="File">Image article</label>
            <input type="file" id="File" name="image">
        </div>     
        <div>
            <br/>
            <button type="submit" class="btn btn-success" name="submit">Valider l'article</button>
        </div>
    </div>
</form>
