<?php

namespace Model\Tables;


use \PDO as PDO;
use Model\Database as Database;

class Admins{

	private $db;
	private $email;
	private $name;
	private $password;
	private $role;


	public  function __construct(){

		$this->db = new Database();

		return $this->db;
	}

	public function get_admins(){

		$sql = "SELECT * FROM admins";
			
		$response = $this->db->query($sql);
		return $response;
		
	}








}
