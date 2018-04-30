<?php
$posts = $postsControler->AllPosts('AllPosts');
$find = false;

if(isset($_GET['id'])){
	foreach ($posts as $post){

		if($_GET['id'] == $post->id){
			$find = true;


			if(isset($_POST['submit'])){
                if($_FILES['image']['name'] == ''){
                    $_FILES['image']['name'] = $post->image;
                }
				$_POST['id'] = $_GET['id'];
				if(!empty($postsControler->verif($_POST, $_FILES))){
					echo '<div style="border:solid 6px red">';

						foreach ($postsControler->verif($_POST, $_FILES) as $key => $value) {
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
</div>
<div class="container-fluid">
    <div>
        <img src="../img/<?= $post->image ?>" alt="<?= $post->title ?>" class="img-rounded" height="300px" width="100%"/>
    </div>
</div>
<div class="container">
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group">
        	<label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $post->title ?>"/>   
        </div>
        <div>
	        <label for="content" class="form-group">Contenu de l'article</label>         
	        <textarea id="content" name="content" class="tinymce form-control" rows="20px"><?= $post->content ?></textarea> 
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="public" <?php echo ($post->posted == '1')?"checked" : "" ?>/>
         		Public
            </label>
        </div>
        <div class="form-group">
            <label for="File">Image article</label>
            <input type="file" id="File" name="image">
            <p><?php echo $post->image?></p>
        </div> 
        <div>
            <br/>
            <button type="submit" class="btn btn-success" name="submit">Modifier l'article</button>
        </div>
        <br>
    </div>
</form>
<?php
}}}