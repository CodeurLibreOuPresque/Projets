<?php

namespace Model\Tables;


use \PDO as PDO;
use Model\Database as Database;
class Comments{

	private $name;
	private $email;
	private $comment;
	private $date;
	private $post_id;
	private $seen;

	public function __construct(){

		$this->db = new Database();

		return $this->db;
	}

	public function get_comments($post_id){

		$sql = "SELECT * FROM comments WHERE post_id = $post_id ORDER BY date ASC";

		$response = $this->db->query($sql);

		return $response;
	}

	public function All_Comments_Not_Seen(){
		
		$sql = "SELECT * FROM comments WHERE seen = 0 ORDER BY date ASC";

		$response = $this->db->query($sql);

		return $response;
	}

	public function delete_comment($id){
		return $this->db->exec("DELETE FROM comments WHERE id = $id ");
	}

	public function write_comment($name,$email,$comment,$post_id){

		$array = [
			'name' 		=> $name,
			'email'		=> $email,
			'comment'	=> $comment,
			'post_id'	=> $post_id
		 ];

		$sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";

		$request = $this->db->execute($sql, $array);

		return $request;
	}

	public function set_seen($id, $value){
		$array = [
			'value'	=> $value,
			'id' 	=> $id
		];

		$update = "UPDATE comments SET seen = :value WHERE id = :id";

		$request = $this->db->execute($update, $array);
	}
}