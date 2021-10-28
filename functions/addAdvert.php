<?php
    session_start();
    require_once(dirname(__FILE__ ) . "/../configs/database.php");

    

    $req = $db->prepare('INSERT INTO annonce(titre, description, prix, auteur_id, image_url, date_creation, localisation, statut) VALUES (:titre, :description, :prix, :auteur_id, :image_url, NOW(), :localisation, :statut)');
    $req->bindParam(':titre', $_POST["titre"]);
    $req->bindParam(':description', $_POST["description"]);
    $req->bindParam(':prix', $_POST["prix"]);
    $req->bindParam(':auteur_id', $_SESSION["auteur_id"]);
    $req->bindParam(':image_url', $_POST["image_url"]);
    $req->bindParam(':localisation', $_POST["localisation"]);
    $req->bindParam(':statut', $_POST["statut"]);
    $req->execute();

    $auteur_id = $db->lastInsertId();

    header("Location: ../advert_page.php?id=$auteur_id");
?>