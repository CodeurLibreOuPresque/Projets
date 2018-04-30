<?php

namespace Model;
use \PDO as PDO;

class Database{
	
	private $dbhost = 'localhost';
	private $dbname = 'blogMVC';
	private $dbuser = 'root';
	private $dbpswd = '';
	public $pdo = null;


	public function get_PDO(){
		$pdo = new PDO('mysql:host=' . $this->dbhost . ';dbname='. $this->dbname, $this->dbuser, $this->dbpswd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo = $pdo;

		return $pdo;
	}

	public function query($statement){
		if($this->pdo == null ){
			$this->pdo = $this->get_PDO();
		}

		$request = $this->pdo->query($statement);
		$data = $request->fetchAll(PDO::FETCH_OBJ);

		return $data;
	}

	public function execute($statement, $array){
		if($this->pdo == null ){
			$this->pdo = $this->get_PDO();
		}	

		$request = $this->pdo->prepare($statement);
		$response = $request->execute($array);
		return $response;
	}

	public function exec($statement){
		if($this->pdo == null ){
			$this->pdo = $this->get_PDO();
		}	

		$response = $this->pdo->exec($statement);

		return $response;

	}




}