<?php
// Initialisation de la session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/style.css"/>
  <title>connexion & inscription</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="index2.php" class="sign-in-form" method="POST">
          <h2 class="title">Connexion</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>

            <input type="text" name="username" value="" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" value="" required>
          </div>
          <?php
          // Si dans l'url il y'a le message 'error'
          if (isset($_GET['error'])){
            // Si le message 'error' == 'mauvaislogs'
            if ($_GET['error'] == 'mauvaislogs'){
              // Affichage du message dans 'echo' 
              echo "<u>Ce n'est pas les bons logs, allez vous inscrire !</u>";

            }
          }
         ?>
          <input type="submit" value="login" class="btn solid" name="login">
        </form>

        <form action="index2.php" class="sign-up-form" method="POST">
          <h2 class="title">inscription</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="username" name="username" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="email" name="email" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="password" name="password" value="" required />
          </div>
          <input type="submit" class="btn" value="Signup" name="submit" />
          <?php
          //Si la clef session existe alors renvoie vers home.html
          if (key_exists("username", $_SESSION) || key_exists("password", $_SESSION)){

              header("Location: ./connexion inscription/home");
          
          } else {

          //Sinon rien car la page home.php s'occupe d'afficher le message d'erreur
            echo " ";

            }
          ?>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>TODOLIST</h3><br>
          <button class="btn transparent" id="sign-up-btn">
            inscription
          </button>
        </div>
        <img src="assets/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>TODOLIST</h3><br>
          <button class="btn transparent" id="sign-in-btn">
            CONNEXION
          </button>
        </div>
        <img src="assets/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="assets/app.js"></script>
</body>

</html>