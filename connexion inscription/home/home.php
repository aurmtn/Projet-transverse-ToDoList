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
                        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                        <i class="fa far far fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-done" data-toggle="tooltip" data-placement="bottom" title="Supprimer tâche"></i>Supprimer tâche

                        <!-- </div> -->
                    </form>

                    <!-- =============================================================================================================================================================================== -->
                    <!-- Message d'erreur si l'utilisateur ne rentre aucune tache -->
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET['error'] == 'aucunetache') {
                            //  Affichage du message dans 'echo' 
                            echo "<h3><br><br>Ajoute une tâche !</h3>";
                        }
                    }
                    ?>
                    <!-- =============================================================================================================================================================================== -->

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

                        $PDO = new PDO('mysql:host=localhost;dbname=to_do_list', $DB_USER, $DB_PASS, $options);

                        $sql = "INSERT INTO taches (nomtache) VALUES (:nomtache)";

                        $stmt = $PDO->prepare($sql);

                        $stmt->execute(['nomtache' => $taches]);

                        header('Location: ./home.php');
                    }
                }

                ?>
                <!-- =============================================================================================================================================================================== -->

                    
                <!-- Liste des tâches à faire -->
                <div class="row mx-1 px-5 pb-3 w-80">
                    <div class="col mx-auto">
                        <!-- Tâche n°1 -->
                        <!-- <div class="row px-3 align-items-center todo-item rounded">
                            <div class="col-auto m-1 p-0 d-flex align-items-center">
                                <h2 class="m-0 p-0">
                                    <i class="fa fa-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip" data-placement="bottom" title="Noter comme fait"></i>
                                </h2>
                            </div>
                        </div> -->
                        <!-- <div class="col-auto m-1 p-0 todo-actions">
                    <div class="row d-flex align-items-center justify-content-end">
                        <h5 class="m-0 p-0 px-2">
                            <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom"
                                title="Modifier tâche"></i> -->
                        <!-- </h5>

                        </h5> -->
                    <!-- </div> -->
                    <!-- <div class="row todo-created-info">
            <div class="col-auto d-flex align-items-center pr-2">
                <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="Date de création" data-original-title="Date de création"></i>
                <label class="date-label my-2 text-black-50">*Inserer date* Exemple 1/1/2020</label>
            </div>
        </div> -->
                    <!-- </div>
    </div> -->


                    <!-- =============================================================================================================================================================================== -->

                    <?php

                    $PDO = new PDO('mysql:host=localhost;dbname=to_do_list', $DB_USER, $DB_PASS, $options);

                    $stm = $PDO->query('SELECT * FROM taches');

                    $rows = $stm->fetchAll(PDO::FETCH_NUM);

                    foreach ($rows as $row) {
                        echo ("<br><br><center><h3>$row[0]</h3></center><br>");
                    }

                    ?>

                    <!-- =============================================================================================================================================================================== -->
                    

                        <!-- Tâche n°2 -->