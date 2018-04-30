<?php


use \Model\Tables\Posts;
/**
* 
*/
class postsControler
{
	private $posts;
	
	public function __construct(){
		if($this->posts == null){
			$this->posts = new Posts();
		}
	}

	public function AllPosts($posted = null){
		return $this->posts->get_posts($posted);
	}

	public function deletePost($id){
		return $this->posts->delete_post($id);
	}

	public function verif($array, $files){
		$title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        $id = intval(htmlspecialchars(trim($_POST['id'])));
        $posted = intval(isset($_POST['public']));
		$errors = [];

		$nvArray = [
			'title' 	=> $title,
			'content' 	=> $content,
			'id'		=> $id,
			'posted' 	=> $posted
		];

	    if(empty($title) || empty($content) || empty($id)){
	        $errors['empty'] = "Tous les champs n'ont pas été remplis";
	    }
     	if(!empty($_FILES['image']['name'])){
        	$file = $_FILES['image']['name'];
        	$extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
        	$extension = strrchr($file,'.');

	        if(!in_array($extension,$extensions)){
	            $errors['image'] = "Cette image n'est pas valable";
	        }
      
    	}
	    if(empty($errors)){	
	    	if(!empty($_FILES['image']['name'])){
	    		$nvArray['image'] = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],"../img/".$nvArray['image']);
            }
            $this->updatePost($nvArray);
	    }

	    return $errors;
	}


	private function updatePost($array){
		if(isset($array['image'])){
			$image = $array['image'];
		}else{
			$image = 'default.jpg';
		}	
		return $this->posts->update_post($array['title'], $array['content'], $image , $array['posted'], $array['id']);
	}

	public function writeVerif($array, $files){
		$title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        $posted = intval(isset($_POST['public']));
      	
		$errors = [];
		
		$nvArray = [
			'title' 	=> $title,
			'content' 	=> $content,
			'posted' 	=> $posted
		];
	
		if(empty($title) || empty($content)){
	        $errors['empty'] = "Tous les champs n'ont pas été remplis";
	    }
	    if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['image'] = "Cette image n'est pas valable";
            }
          
        }
	    if(empty($errors)){
	    	if(!empty($_FILES['image']['name'])){
	    		$nvArray['image'] = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],"../img/".$nvArray['image']);
            }
   
		
	    	$this->makePost($nvArray);  	
	    }
	    return $errors;
	}

	private function makePost($array){
		
		if(isset($array['image'])){
			$image = $array['image'];
		}else{
			$image = 'default.jpg';
		}
	

		return $this->posts->write_post($array['title'], $array['content'], $image, $array['posted']);
	}
}
