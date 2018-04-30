<?php 

if(isset($_POST['submit'])){
	if(!empty($adminsControler->verif($_POST))){
		echo '<ol class="breadcrumb well">';

			foreach ($adminsControler->verif($_POST) as $key => $value) {
				echo '<li>' . $value . '</li>';
			}

		echo '</ol>';
	}else{
			$_SESSION['admin'] = $_POST['email'];
		?>
			<script>
                window.location.replace("index.php?p=dashboard");
            </script>
           
		<?php
	}
}



?>


<div class="row">
	<div class="col-lg-offset-4 col-lg-4">

		<img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1412243/580/386/m1/fpnw/wm0/lawyer-avatar-flat-icon-01-.jpg?1467280299&s=534314141834ef9547a787979e939f90" alt="Avatar" class="img-rounded" width=100%>

		<form method="POST" >

			<label for="email" class="form-group">Adresse-mail</label>
			<input type="email" name="email" id="email" class="form-control">

			<label for="password" class="form-group">Mot de passe</label>
			<input type="password" name="password" id="password" class="form-control">
			<br>
			<input type="submit" class="btn btn-default btn-block btn-warning" name="submit" value="Se connecter">
		</form>
	</div>
</div>

