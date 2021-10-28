<?php
session_start();
    require_once("components/header.php");
    require_once("components/nav-bar.php");
    require_once("./configs/database.php");
    require_once("./configs/config.php");
    require_once("functions/getUser.php");

    $req = $db->prepare("SELECT id, titre, description, prix, auteur_id, image_url, localisation, statut, DATE_FORMAT(date_creation, '%d/%m/%Y à %H:%i:%S') AS date_creation_format FROM annonce WHERE id = :id");
    $req->bindParam(':id', $_GET["id"]);
    $req->execute();

    $result = $req->fetch(PDO::FETCH_ASSOC);
    $user = getUser($result["auteur_id"]);

?>

<div class="page-title" style="background-image: url(dist/images/page-title.jpg);">
    <br>
    <br>
        <div class="large-title text-center">        
            <h2>Voir l' Annonce</h2>
        </div>
    <br>
    <br>
</div>
<br><br>
<div class="container" align="center" style="background-color: burlywood; margin-left: 6em; padding: 3em;">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $result["image_url"] ?>" alt="Voir Article">
        </div>
        <div class="col-md-6">
            <h1><u><?= $result["titre"] ?></u></h1><br>
            <p>
                <u>Publié par :</u>  <?= $user["nom"] ?> (<?= $user["pseudo"] ?>)<br><br>
                <u>Localisation :</u>  <?= $result["localisation"] ?> <br><br>
                <u>Statut </u>:  <?= $result["statut"] ?> <br><br>
                <u>Téléphone :</u>  <?= $user["telephone"] ?> <br><br>
                <u>Prix :</u>  <?= $result["prix"] ?> FrancsCFA<br><br>
                <u>Date :</u>  Le <?= $result["date_creation_format"] ?> 
            </p>
            <p><u>Description :</u><br> <?= $result["description"] ?> </p>
        
        </div>
    </div>
</div>

<br><br>

<?php

    require_once("components/footer.php");

?>