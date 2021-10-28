<?php
require_once (dirname(__FILE__) . "/config.php");

    try {
        $db = new PDO('mysql:host=localhost:3308;dbname=annonces', "root", "");
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>
