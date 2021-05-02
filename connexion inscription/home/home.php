<?php
require 'db-config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/home.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="assets/taches.js"></script>

<!-- =============================================================================================================================================================================== -->
    <?php
    //Initialisation de la session
    session_start();
    //Affichage du nom de l'utilisateur sur la page d'acceuil
    echo "<br><br><center><h2>Bienvenue  " . $_SESSION["username"] . " ! </h2></center>";
    ?>
<!-- =============================================================================================================================================================================== -->

    <!-- Titre de la page -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                <u> ESGI - Todo List</u>
            </div>
        </div>
    </div>
    <!-- Section création des tâches  -->
    <div class="row m-1 p-3">
        <div class="col col-11 mx-auto">
            <div class="col col-11 mx-auto">
                <div class="row bg-white rounded shadow-sm p-2 add todo-wrapper aligh-items-center justify-content-center">

                    <form method="POST" action="home.php">
                        <!-- <div class="col"> -->
                        <input class="form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Ajouter nouvelle tâche..." name="nouvelletache">
                        <br><br><input class="form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Année-mois-jour" name="date">                        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                    </form>

                    <div class="col-auto m-0 px-2 d-flex align-items-center">
                        <label class="text-secondary my-3 p-0 px-1 view-opt label due-date-label d-none">Date de
                            de rendu non définie</label>
                    </div>
                    
                </div>

<!-- =============================================================================================================================================================================== -->

                <?php

                require 'db-config.php';

                if (isset($_POST["submit"])) {

                    if (empty($_POST['nouvelletache'])) {
                        header("Location: ./home.php?error=aucunetache");
                    } else {


                        $taches = $_POST["nouvelletache"];
                        $date = $_POST["date"];

                        $PDO = new PDO('mysql:host=localhost;dbname=to_do_list', $DB_USER, $DB_PASS, $options);

                        $sql = "INSERT INTO taches (nomtache, date) VALUES (:nomtache, :date)";

                        $stmt = $PDO->prepare($sql);

                        $stmt->execute(['nomtache' => $taches, 'date' => $date]);

                        header('Location: ./home.php');
                    }
                }

                ?>
<!-- =============================================================================================================================================================================== -->

                <div class="row mx-1 px-5 pb-3 w-80">
                    <div class="col mx-auto">
                    
<!-- =============================================================================================================================================================================== -->
                    <?php

                    if (isset($_GET["error"])) {
                        if ($_GET['error'] == 'aucunetache') {
                            //  Affichage du message dans 'echo' 
                            echo "<br><left><h3>Ajoute une tâche !</h3></left>";
                        }
                    }

                    ?>
<!-- =============================================================================================================================================================================== -->
                    
                    <div class="text-center">

                        <form action="home.php" method="POST">
                            <br>
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>

                    </div>

<!-- =============================================================================================================================================================================== -->

                    <?php

                        $PDO = new PDO('mysql:host=localhost;dbname=to_do_list', $DB_USER, $DB_PASS, $options);

                        $stm = $PDO->query('SELECT * FROM taches');

                        $rows = $stm->fetchAll(PDO::FETCH_NUM);

                        foreach ($rows as $row) {
                               echo ("<br><br><center><h2>$row[0]</h2><u>tache N° $row[1] A rendre avant le : $row[2]</u></center>");
                                                                  
                        }

                    ?>


<!-- =============================================================================================================================================================================== -->
                         <?php
                                                     
                            if(isset($_POST['supprimer'])){
                            
                                $PDO->exec('TRUNCATE TABLE `taches`');   

                                }
                            
                         ?>