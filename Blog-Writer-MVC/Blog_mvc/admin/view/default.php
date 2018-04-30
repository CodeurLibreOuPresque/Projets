<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blog mvc</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

  </body>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
   

<nav class="navbar navbar-inverse " role="navigation">

  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php?p=dashboard">Accueil</a>
        <a class="navbar-brand" href="index.php?p=liste">Liste</a>
        <a class="navbar-brand" href="../index.php?p=home">Sortir</a>
        <a class="navbar-brand" href="index.php?p=write">Redaction</a>
        <?php
        if (isset($_SESSION['admin'])) {
          echo '<a class="navbar-brand" href="index.php?p=logout">Déconnexion </a>';
        }else{
          echo '<a class="navbar-brand" href="index.php?p=login">Connexion</a>';
        }
        ?>
	    </div>  
   </div><!-- /.navbar-collapse -->

</nav>



<div class="container"> 
   <?= $content;?>
</div>
  <script type="text/javascript" src="/admin/tinymce/js/jquery.min.js"></script>
  <script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>
</body>
    
</html>