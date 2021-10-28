<?php
    require_once("components/header.php");
    require_once("components/nav-bar.php");
?>
    <body>
        <div class="container-fluid" id="form">
            <form  action="functions/create-user.php" method="post" class="col-md-4 offset-4">
                <br>
                <h1 style="text-align: center;">Créer un Compte</h1>
                <br>
                <?php if(isset($_GET['message'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_GET['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </div>
                <?php endif ?> 
                <div class="form-group">
                    <input type="text" name="nom" class="form-control" placeholder="Nom Complet">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudonyme">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="mail" class="form-control" placeholder="Adresse Email">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="telephone" class="form-control" placeholder="Telephone">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de Passe">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Retapez le a nouveau !">
                </div>
                <br>
                <div class="form-group form-check">
                    <input type="checkbox" name="role" id="role" class="form-check-input">
                    <label for="role"> Je Suis un Agent Immobilier </label>
                </div>
                <br>
                <div class="form-group">
                    <a href="login.php" class="btn btn-warning">Connexion</a>
                    <input type="submit" value="Créer mon Compte" class="btn btn-primary">
                </div>   
            <br><br>
            </form>
            <br><br>
        </div>
        <br>
