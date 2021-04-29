<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="assets/taches.js"></script>
    <link rel="stylesheet" href="assets/home.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   

    <?php
        //Initialisation de la session
        session_start();
        //Affichage du nom de l'utilisateur sur la page d'acceuil
        echo "<center><h1>Bienvenue  " . $_SESSION["username"] . " ! </h1></center>";
    ?>

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
                <div
                    class="row bg-white rounded shadow-sm p-2 add todo-wrapper aligh-items-center justify-content-center">
                    <div class="col">
                        <input class="form-control-lg border-0 add-todo-input bg-transparent rounded" type="text"
                            placeholder="Ajouter nouvelle tâche...">
                    </div>
                    <div class="col-auto m-0 px-2 d-flex align-items-center">
                        <label class="text-secondary my-2 p-0 px-1 view-opt label due-date-label d-none">Date de
                            de rendu non définie</label>
                        <i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip"
                            data-placement="bottom" title="Définir une date de rendu"></i>
                        <i class="fa far far fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-done"
                            data-toggle="tooltip" data-placement="bottom" title="Supprimer date limite"></i>
                    </div>
                    <i class="fa far fa-calendar my-2 px-1 text-danger btn clear-due-date-button d-none"
                        data-toggle="tooltip" data-placement="bottom" title="Effacer la date limite"></i>
                </div>
                <div class="col-auto px-0 mx-0 mr-2">
                    <!-- Fonction pour ajouter une nouvelle tâche -->
                    <button type="button" class="btn btn-primary" onclick="ajouter()">Ajouter</button>
                    <div id="Menu">
                        <!-- Menu des tâches -->
                        <u>Importance de la tâche</u>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 mx-4 border-black-25 border-bottom"></div>
    <div class="row m-1 p-3 px-5 justify-content-end">
        <div class="col-auto d-flex align-items-center">
          <!-- Filtres  -->
            <label class="text-secondary my-2 pr-2 view-opt-label">Filtres</label>
            <select class="custom-select custom-select-sm btn my-2">
                <option value="all" selected>Tout</option>
                <option value="completed">Complétées</option>
                <option value="active">En cours</option>
                <option value="has-due-date">A une date limite</option>
            </select>
        </div>
        <div class="col-auto d-flex align-items-center px-1 pr-3">
            <label class="text-secondary my-2 pr-2 view-opt-label">Trier</label>
            <select class="custom-select custom-select-sm btn my-2">
                <option value="added-date-asc" selected>Date d'ajout</option> 
                <option value="due-date-desc">Date limite</option>
            </select>
            <i class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip"
                data-placement="bottom" title="Croissant"></i>
            <i class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1 d-none" data-toggle="tooltip"
                data-placement="bottom" title="Décroissant"></i>
        </div>
    </div>
    <!-- Liste des tâches à faire -->
    <div class="row mx-1 px-5 pb-3 w-80">
        <div class="col mx-auto">
            <!-- Tâche n°1 -->
            <div class="row px-3 align-items-center todo-item rounded">
                <div class="col-auto m-1 p-0 d-flex align-items-center">
                    <h2 class="m-0 p-0">
                        <i class="fa fa-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip"
                            data-placement="bottom" title="Noter comme fait"></i>
                        <i class="fa fa-check-square-o text-primary btn m-0 p-0" data-toggle="tooltip"
                            data-placement="bottom" title="Noter comme à faire"></i>
                    </h2>
                </div>
                <div class="col px-1 m-1 d-flex align-items-center">
                    <input type="text"
                        class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3"
                        readonly value="Lorem Ipsum azdbhazdb" title="Lorem Ipsum azdbhazdb" />
                    <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-3 d-none"
                        value="Lorem Ipsum azdbhazdb" />
                </div>
                <div class="col-auto m-1 p-0 px-3 d-none">
                </div>
                <div class="col-auto m-1 p-0 todo-actions">
                    <div class="row d-flex align-items-center justify-content-end">
                        <h5 class="m-0 p-0 px-2">
                            <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom"
                                title="Modifier tâche"></i>
                        </h5>
                        <h5 class="m-0 p-0 px-2">
                            <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip"
                                data-placement="bottom" title="Supprimer tâche"></i>
                        </h5>
                    </div>
                    <div class="row todo-created-info">
                        <div class="col-auto d-flex align-items-center pr-2">
                            <i class="fa fas fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip"
                                data-placement="top" title="Supprimer la tâche"></i>
                            </h5>
                        </div>
                        <div class="row todo-created-info">
                            <div class="col-auto d-flex align-items-center pr-2">
                                <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip"
                                    data-placement="bottom" title="Date de création"
                                    data-original-title="Date de création"></i>
                                <label class="date-label my-2 text-black-50">*Inserer date* Exemple 1/1/2020</label>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Tâche n°2 -->
                 <div class="row px-3 align-items-center todo-item rounded">
                <div class="col-auto m-1 p-0 d-flex align-items-center">
                    <h2 class="m-0 p-0">
                        <i class="fa fa-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Noter comme fait"></i>
                        <i class="fa fa-check-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip" data-placement="bottom" title="Noter comme à faire"></i>
                    </h2>
                </div>
                <div class="col-auto m-1 p-0 px-3">
                    <div class="row">
                        <div class="col-auto d-flex align-items-center rounded bg-white border border-warning">
                            <i class="fa fa-hourglass-2 my-2 px-2 text-warning btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="A rendre à temps"></i>
                            <h6 class="text my-2 pr-2">28th Jun 2020</h6>
                        </div>
                    </div>
                </div>
                <div class="col-auto m-1 p-0 todo-actions">
                    <div class="row d-flex align-items-center justify-content-end">
                        <h5 class="m-0 p-0 px-2">
                            <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Editer tâche"></i>
                        </h5>
                        <h5 class="m-0 p-0 px-2">
                            <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Supprimer tâche"></i>
                        </h5>
                    </div>
                    <div class="row todo-created-info">
                        <div class="col-auto d-flex align-items-center pr-2">
                            <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Date de création"></i>
                            <label class="date-label my-2 text-black-50">28th Jun 2020</label>
                        </div>
                    </div>
                </div>
            </div>