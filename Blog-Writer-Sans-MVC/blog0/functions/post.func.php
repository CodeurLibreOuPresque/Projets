<?php

function get_post(){
    global $db;

    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id='{$_GET['id']}'
        AND posts.posted = '1'
    ");

    $result = $req->fetchObject();
    return $result;
/*
    get_post : Récupérer tous les posts(articles) dont le writer est l'adresse email de l'admins
    avec comme id celui passé dans l'url, et posted =1

    renvoi d'un objet via fetchObject
*/
}


function comment($name,$email,$comment){

    global $db;

    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $_GET["id"]

    );

    $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);

}

function get_comments(){

    global $db;
    $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;

}

/* 
    get_comments : Recuperer les commentaires en fonction de l'id de l'article ordonée par date decroissante
*/

function is_comment($name, $email, $comment){

    $errors = [];

    if(empty($name) || empty($email) || empty($comment)){
            $errors['empty'] = "Tous les champs n'ont pas été remplis";
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "L'adresse email n'est pas valide";
        }
    }

    return $errors;
}

function set_seen($id){
    global $db;

    $db->exec("UPDATE comments SET seen='0' WHERE id= $id ");

    return 1;
}