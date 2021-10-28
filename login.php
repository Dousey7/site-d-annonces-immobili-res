<?php
    require_once("components/header.php");
    require_once("components/nav-bar.php");
?>

    <body>
        <div class="container-fluid" id="form">
            <form  action="functions/login-user.php" method="post" class="col-md-6 offset-2">
                <br>
                <h1 style="text-align: center;">Se Connecter</h1>
                <br>
                <?php if(isset($_GET['message'])) : ?>
                    <?php if (isset($_GET['type']) && $_GET['type'] === "success"){
                        $classMessage = "alert alert-success alert-dismissible fade show";
                    }else{
                        $classMessage = "alert alert-danger alert-dismissible fade show";
                    }
                    ?>
                    <div class="<?= $classMessage ?>" role="alert">
                        <?php echo $_GET['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </div>
                <?php endif ?>
                <br>
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudonyme">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de Passe">
                </div>
                <br>
                <div class="form-group">
                    <a href="register.php" class="btn btn-warning">S'Inscrire</a>
                    <input type="submit" value="Connexion" class="btn btn-primary">
                </div>
            </form>
        </div>


    </body>
</html>