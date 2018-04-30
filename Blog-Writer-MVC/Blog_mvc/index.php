<?php 
require('model/Autoloader.php');

Model\Autoloader::register();

	$adminsControler	= new adminsControler();
	$postsControler = new postsControler();
	$commentsControler	= new commentsControler();

if(isset($_GET['p'])){
	$p = $_GET['p'];
}else{
	$p='home';
}


ob_start();

if($p === 'home'){
	require 'view/home.php';
}else if($p === 'post'){
	require 'view/post.php';
}else if($p ==='action'){
	require 'controler/actionV.php';
}

$content = ob_get_clean();
require 'view/default.php';

?>






