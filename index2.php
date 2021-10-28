<?php 
    session_start(); 
    
    require_once("components/header.php");
    require_once("components/nav-bar.php");
    require_once("functions/getUser.php");
    
    
?>

<div class="page-title" style="background-image: url(dist/images/page-title.jpg);">
    <br>
    <br>
        <div class="large-title text-center">        
            <h2><u>Toutes les Annonces :</u></h2>
        </div>
    <br>
    <br>
</div>
<br><br>

<div class="container" style="background-color: darksalmon;">
    <div class="row">
        <?php
            $req = $db->prepare("SELECT id, titre, description, auteur_id, image_url, localisation, statut, DATE_FORMAT(date_creation, '%d/%m/%Y à %H:%i:%S') AS date_creation_format FROM annonce ORDER BY date_creation DESC");
            $req->execute();

            while($result = $req->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <div class="col-md-6" style="margin: 3em; margin-left: 17em;">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <a href="advert-page.php" >
                                        <img class="card-img" src="<?= $result["image_url"] ?>" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                    <a href="advert-page.php?id=<?= $result["id"] ?>" >
                                        <h5 class="card-title"><?= $result["titre"] ?></h5>
                                    </a>
                                        <p class="card-text">
                                            <?php 
                                                $user = getUser($result["auteur_id"]);
                                            ?>
                                            <small class="text-muted"> <u>Publié par :</u> <?= $user["nom"] ?> (<?= $user["pseudo"] ?>) </small><br>
                                            <small class="text-muted"> <u>Statut </u>: <?= $result["statut"] ?> <br> <u>Localisation :</u> <?= $result["localisation"] ?></small>
                                            <br>
                                            <small class="text-muted"> <u>Téléphone :</u> <?= $user["telephone"] ?></small>
                                            <br>
                                            <small class="text-muted"> <u>Date :</u> Le <?= $result["date_creation_format"] ?></small>
                                        </p>
                                        <br>
                                        <p class="card-text">
                                            <?= substr($result["description"],0,100) ?> ...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endwhile ?>      
    </div>
</div>
<br><br>
