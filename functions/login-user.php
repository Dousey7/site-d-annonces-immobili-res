<?php
    require_once (dirname(__FILE__) . "/../configs/database.php");

    $passwordToHash = $_POST['password'] . $config["SECRET_KEY"];
    $hash = md5($passwordToHash);

    $req = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND password = :password");
    $req->bindParam(":pseudo", $_POST['pseudo']);
    $req->bindParam(":password", $hash);
    $req->execute();

    $result = $req->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        header("Location: ../login.php?message=Identifiant ou Mot de Passe Incorrects");
    }else{
        session_start();
        $_SESSION["pseudo"] = $result["pseudo"];
        $_SESSION["id"] = $result["id"];
        $_SESSION["nom"] = $result["nom"];
        $_SESSION["mail"] = $result["mail"];
        $_SESSION["date_inscription"] = $result["date_inscription"];
        
        header("Location: ../index.php");
    }

?>