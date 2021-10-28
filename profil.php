<?php
  session_start(); 
  require_once(dirname(__FILE__ ) . "/configs/database.php");
  require_once("functions/getUser.php");

  // S'il n'y a pas de session alors on ne va pas sur cette page
    if(!isset($_SESSION['id'])){ 
      header('Location: connexion.php'); 
      exit; 
    }

  // On récupère les informations de l'utilisateur connecté
  $req = $db->prepare('SELECT * FROM utilisateur WHERE id = ?');
  $req->execute();

  $result = $req->fetch(PDO::FETCH_ASSOC);

?>


<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="dist/images/ico/favicon.ico">
    <link rel="shortcut icon" href="dist/images/ico/favicon.ico">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style2.css">
    <title>Mon profil</title>
  <head>
  <body>

  <?php require("components/nav-bar.php"); ?>

  <div class="page-title" style="background-image: url(dist/images/page-title.jpg);">
    <br>
    <br>
        <div class="large-title text-center">        
            <h2>Mon Profil</h2>
        </div>
    <br>
    <br>
  </div>
<br><br>

      <div class="container">
      <div class="row">

        <div class="col-sm-0 col-md-2 col-lg-3"></div>
        <div class="col-sm-12 col-md-8 col-lg-6">

          <div class="cdr-ins">
          
            <br>
             <h2 style="text-align: center"> <u> Voici le profil de : </u> <br><br><?= $_SESSION['pseudo'] ?> (<?= $_SESSION['nom'] ?>)</h2>

              <div style="margin: 30px 0" align="center">
                  <?php
                    if(file_exists("/public/avatars/". $_SESSION['pseudo']) && isset($_SESSION['avatar'])){
                  ?>
                    <img src="<?= "/public/avatars/". $_SESSION['pseudo'] . "/" . $_SESSION['avatar']; ?>" width="150" class="sz-image"/>
                  <?php
                    }else{
                  ?>
                    <img src="public/avatars/default/avatar.jpg" width="120" class="sz-image">
                  <?php
                    }
                  ?>
              </div>
            
              <hr style="color: darkorange; border: 5px solid;">
            <div align="center">
              <div class="form-group">
                <a class="btn btn-primary" style="background-color: dodgerblue;" aria-current="page" href="advert-form.php">Ajouter une Annonce</a>
              </div> 
            <br>
              <div class="form-group">
                <a class="btn btn-primary" style="background-color: green;" href="#"> Modifier mon Profil </a>
              </div>
            <br>
              <div class="form-group">
                <a class="btn btn-primary" style="background-color: dodgerblue;" href="#"> Ajouter un Avatar </a>
              </div>
            </div>
            <hr style="color: darkorange; border: 5px solid;">

             <div align="center">
               <u><b> Quelques informations sur vous : </b></u>

                <ul>
                  <li> Votre id est : <b><?= $_SESSION['id'] ?> </b></li>
                  <li> Votre mail est : <b><?= $_SESSION['mail'] ?> </b></li>
                  <li> Votre compte a été crée le : <b><?= $_SESSION['date_inscription'] ?> </b></li>
                </ul>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<br><br>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>
  <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
