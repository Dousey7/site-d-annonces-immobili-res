<?php
    require_once (dirname(__FILE__) . "/../configs/database.php");

    $req = $db->prepare("DELETE FROM annonces WHERE id = :id");
    $req->bindParam(":id", $_GET['id']);
    $req->execute();

    header("Location: ../index.php");
?>