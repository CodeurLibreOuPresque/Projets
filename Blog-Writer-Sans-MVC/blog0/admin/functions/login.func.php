<?php


function is_admin($email,$password)
{
    global $db;
    $a = [
        'email'     =>  $email,
        'password'  =>  sha1($password)
    ];
    $sql = "SELECT * FROM admins WHERE email = :email AND password = :password";
    $req = $db->prepare($sql);
    $req->execute($a);
    $exist = $req->rowCount($sql);
    return $exist;
}


function is_submit($email, $password){

    $errors = [];

    if(empty($email) || empty($password)){
        $errors['empty'] = "Tous les champs n'ont pas été remplis!";
    }
    else if(is_admin($email,$password) == 0){
        $errors['exist']  = "Cet administrateur n'existe pas";
    }

    return $errors;
   
}