<?php

namespace Model;


class Autoloader{

	static function register(){
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class_name){
		
		if(!(strpos($class_name, "Model\\") === 0)){
			require  'controler/'.$class_name . '.php';


		}else{
			$class_name = str_replace("Model\\", "", $class_name);
			require $class_name . '.php';
		}

	
		
	}

	static function Admin_register(){
		spl_autoload_register(array(__CLASS__, 'Admin_autoload'));
	}

	static function Admin_autoload($class_name){
		
		if(!(strpos($class_name, "Model\\") === 0)){
			require  '../controler/'.$class_name . '.php';


		}else{
			$class_name = str_replace("Model\\", "", $class_name);
			require $class_name . '.php';
		}

	
		
	}

	
}