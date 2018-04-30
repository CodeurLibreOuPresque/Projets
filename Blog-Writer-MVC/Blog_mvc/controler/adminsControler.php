<?php

use \Model\Tables\Admins;
/**
* 
*/
class adminsControler
{
	private $admins;
	
	public function __construct()
	{
		if($this->admins == null){
			$this->admins = new Admins() ;
		}
	}

	public function redirection(){
		 header("Location:index.php?p=login");
	}

	public function verif($array){
		$email = htmlspecialchars(trim($_POST['email']));
		$password = htmlspecialchars(trim($_POST['password']));
		$admin = $this->admins->get_admins();
		$passwordsha1 = sha1($password);
		$errors = [];


	    if(empty($email) || empty($password)){
	            $errors['empty'] = "Tous les champs n'ont pas été remplis";
	    }else{
	        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	            $errors['email'] = "L'adresse email n'est pas valide";
	        }
	    }
	    

	    if(!($admin[0]->email == $email) || !($admin[0]->password == $passwordsha1)){
			$errors['valid'] = "Email ou mot de passe incorrect";
		}
	    return $errors;
	}

	public function sessionDestroy(){
		session_unset();
    	session_destroy();
	}
}