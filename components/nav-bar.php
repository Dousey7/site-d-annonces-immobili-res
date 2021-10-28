

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><span style="margin-left:2em; font-size: xx-large;"> Sen Immobilier</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="btn btn-primary" style="background-color: dodgerblue;" aria-current="page" href="index2.php">Annonces</a>
        </li>
      </ul>
      <?php
        if (!isset($_SESSION['pseudo'])){
          ?>
            <div class="nav-item">
              <a class="btn btn-warning nav-link" href="login.php">Connexion</a>
            </div>
            |
            <div class="nav-item">
              <a class="btn btn-warning nav-link" href="register.php">Inscription</a>
            </div>
          <?php
        }else{
          ?>
            <div class="nav-item">
              <a class="btn btn-warning nav-link" href="profil.php">Mon Compte</a>
            </div>
            |
            <div class="nav-item">
              <a class="btn btn-warning nav-link" href="functions/disconnect.php">Déconnexion</a>
            </div>
          <?php
        }
      ?>
      
    </div>
  </div>
</nav>