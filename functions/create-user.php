<?php
    require_once (dirname(__FILE__) . "/../configs/database.php");

    if($_POST['password'] !== $_POST['confirmPassword']){
        header("Location: ../register.php?message=Veuillez Vérifier les Mots de Passe");
    }

    $passwordToHash = $_POST['password'] . $config["SECRET_KEY"];
    $hash = md5($passwordToHash);

    $req = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
    $req->bindParam(":pseudo", $_POST['pseudo']);
    $req->execute();

    $result = $req->fetch(PDO::FETCH_ASSOC);

    if($result){
        $message = "Ce Compte existe déjà !";
        header("Location: ../register.php?message=$message");
    }

    if(!$result){
        if(isset($_POST['role'])){
            $role = "Agent Immobilier";
        }else{
            $role = "Visiteur";
        }

    
        $req = $db->prepare("INSERT INTO utilisateur (nom, pseudo, mail, telephone, password, role) VALUES (:nom, :pseudo, :mail, :telephone, password, :role)");
    
        $req->bindParam(":nom", $_POST['nom']);
        $req->bindParam(":pseudo", $_POST['pseudo']);
        $req->bindParam(":mail", $_POST['mail']);
        $req->bindParam(":telephone", $_POST['telephone']);
        $req->bindParam(":password", $hash);
        $req->bindParam(":role", $role);
        $req->execute();
    
        $message = "Compte créé avec Succès";
    
        header("Location: ../login.php?message=$message&type=success");
    }
?>