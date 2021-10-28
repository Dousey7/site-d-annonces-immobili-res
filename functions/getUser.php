<?php
    require_once(dirname(__FILE__ ) . "/../configs/database.php");

    function getUser($id){
        global $db;

        $req = $db->prepare("SELECT * FROM utilisateur WHERE id = :id");
        $req->bindParam(":id", $id);
        $req->execute();

        return $result = $req->fetch(PDO::FETCH_ASSOC);
    }
?>