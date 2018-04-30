<?php


use \Model\Tables\Comments;

/**
* 
*/
class commentsControler
{
	private $comments;
	
	public function __construct()
	{
		if($this->comments == null){
			$this->comments = new Comments();
		}
	}

	public function commentsByPostId($post_id){
		return $this->comments->get_comments($post_id);
	}

	public function AllCommentsNotSeen(){
		return $this->comments->All_Comments_Not_Seen();
	}

	public function verif($array){
		$name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $comment = htmlspecialchars(trim($_POST['comment']));
        $post_id = intval(htmlspecialchars(trim($_POST['id'])));
		$errors = [];

		$nvArray = [
			'post_id'	=> $post_id,
			'name' 		=> $name,
			'email'		=> $email,
			'comment'	=> $comment
		];

	    if(empty($name) || empty($email) || empty($comment)){
	            $errors['empty'] = "Tous les champs n'ont pas été remplis";
	    }else{
	        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	            $errors['email'] = "L'adresse email n'est pas valide";
	        }
	    }
	    if(empty($errors)){
	    	$this->posterCommentaire($nvArray);
	    }
	    return $errors;
	}


	private function posterCommentaire($array){

		return $this->comments->write_comment($array['name'],$array['email'],$array['comment'],$array['post_id']);
	}

	public function deleteComment($id_commentaire){
		return $this->comments->delete_comment($id_commentaire);
	}

	public function seenToOne($id_commentaire){
		return $this->comments->set_seen($id_commentaire, 1); 
	}

	public function seenToZero($id_commentaire){
		var_dump($id_commentaire);
		return $this->comments->set_seen($id_commentaire, 0); 
	}
}