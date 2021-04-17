<?php

session_start();

require 'db-config.php';        //Fichier de configuration

//============ PARTIE CONNEXION ============
          
if(isset($_POST["login"]))  
{       
        $connect = new PDO('mysql:host=localhost;dbname=to_do_list',$DB_USER,$DB_PASS,$options);                                        //Connexion a la base de donnée
        
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";                                             //Requête SQL qui va récupérer les données identifiants et mots de passe dans la table 'user'
        
        $statement = $connect->prepare($query);                                                                                         //Préparation de la requête SQL        
        
        $statement->execute(                                                                                                            //Execution de la requête
        
                array(  
                  'username'     =>     $_POST["username"],                                                                             //Selection de 'username'        
                  'password'     =>     $_POST["password"]                                                                              //Selection de 'password'        
                )  
        );  
        
        $count = $statement->rowCount();                                                                                                //rowCount() va retourer le nombre de ligne suite a l'éxecution de la requête SQL 'SELECT'
        
        if($count > 0)                                                                                                                  //Si le nombre de ligne est supérieur a 0 alors redirection vers la page pour la connexion
        {       
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $_POST["password"];
                header("Location: http://localhost/TODODO/ToDoGit/Projet-transverse-ToDoList/connexion inscription/home"); 

        } else {                                                                                                                            //Sinon affichage du message 'pas les bon logs'  
                echo"<center><h1>Ce n'est pas les bon logs ! </h1></center><br><br>";
                echo"<center><h1><u>Retourne en arrière.</u></h1></center>";
        }

        } else {

                
                //============ PARTIE INSCRIPTION ============


                $user = $_POST['username'];                                                                                             //Récupération de la valeur 'username'
                $password = $_POST['password'];                                                                                         //Récupération de la valeur 'password'
                $mail = $_POST['email'];                                                                                                //Récupération de la valeur 'email'
                
                $PDO = new PDO('mysql:host=localhost;dbname=to_do_list',$DB_USER,$DB_PASS,$options);                                    //Connexion a la base de donnée

                $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";                           //Requête SQL qui va insérer les valeurs des variables dans la table ' users '

                $stmt = $PDO->prepare($sql);                                                                                            //Préparation de la requête SQL

                $stmt->execute(['username' => $user, 'password' => $password, 'email' => $mail]);                                       //Execution de la requête SQL
                
                header("Location: http://localhost/TODODO/ToDoGit/Projet-transverse-ToDoList/connexion inscription/indexDon.php");     //Redirection vers la page d'origine

        }
?>