<?php

require 'db-config.php';

if($_POST['login']) 
{

$user = $_POST['username'];
$password = $_POST['password'];

$PDO = new PDO('mysql:host=localhost;dbname=to_do_list',$DB_USER,$DB_PASS,$options);

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

$stmt = $PDO->prepare($sql);

$stmt->execute(['username' => $user, 'password' => $password]);
}
else
{
      
        $user = $_POST['username'];
        $password = $_POST['password'];
        $mail = $_POST['email'];

        $PDO = new PDO('mysql:host=localhost;dbname=to_do_list',$DB_USER,$DB_PASS,$options);

        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";

        $stmt = $PDO->prepare($sql);

        $stmt->execute(['username' => $user, 'password' => $password, 'email' => $mail]);
        

}


header("Location: http://localhost/TODODO/ToDoGit/Projet-transverse-ToDoList/connexion inscription/home");

?>