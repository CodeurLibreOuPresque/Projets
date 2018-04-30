<?php 
session_start();
require('../model/Autoloader.php');

Model\Autoloader::Admin_register();


	$adminsControler = new adminsControler();
	$postsControler = new postsControler();
	$commentsControler	= new commentsControler();

if(isset($_GET['p'])){
	$p = $_GET['p'];
}else{
	$p='dashboard';
}

ob_start();
if(isset($_SESSION['admin'])){
	if($p === 'dashboard'){
		require 'view/dashboard.php';
	}else if($p === 'liste'){
		require 'view/liste.php';
	}else if($p === 'write'){
		require 'view/write.php';
	}else if($p === 'post'){
		require 'view/post.php';
	}else if($p === 'login'){
		require 'view/login.php';
	}else if($p === 'logout'){
		require 'view/logout.php';
	}else if($p === 'action'){
		require '../controler/action.php';
	}
}else{
	require 'view/login.php';
}

$content = ob_get_clean();
require 'view/default.php';

?>






