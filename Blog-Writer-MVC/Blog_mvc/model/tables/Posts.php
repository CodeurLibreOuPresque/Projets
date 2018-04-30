<?php

namespace Model\Tables;


use \PDO as PDO;
use Model\Database as Database;

class Posts{

	private $db;
	private $title;
	private $content;
	private $date;
	private $image;
	private $writer;
	private $posted;


	public  function __construct(){

		$this->db = new Database();

		return $this->db;
	}

	public function get_posts($posted){
		if($posted == null){
			$sql = "SELECT * FROM posts WHERE posted = 1 ORDER BY date DESC";
		}
		else{
			$sql = "SELECT * FROM posts ORDER BY date DESC";
		}
					
		$response = $this->db->query($sql);

		return $response;
		
	}

	public function write_post($title, $content, $image = "default.png", $posted = 0 , $writer = 'Jean Forteroche'){


		$array = [
			'title'  	=>  $title,
			'content'	=>	$content,
			'image'		=>	$image,
			'writer'	=>	$writer,
			'posted'	=>	$posted
		];


		$sql = "INSERT INTO posts(title, content, date , image, writer , posted) 
				VALUES(:title, :content, NOW(), :image, :writer, :posted)";

		$response = $this->db->execute($sql, $array);

		return $response;
	}

	public function delete_post($id){

		return $this->db->exec("DELETE FROM posts WHERE id = $id");
	}


	public function update_post($title, $content, $image, $posted, $id){
		$array = [
			'title'  	=>  $title,
			'content'	=>	$content,
			'image'		=>	$image,
			'posted'	=>	$posted,
			'id'		=>	$id
		];

		$sql = "UPDATE posts SET title=:title, content=:content, image=:image, date=NOW(), posted=:posted WHERE id=:id";

		$response = $this->db->execute($sql, $array);

		return $response;
	}


}