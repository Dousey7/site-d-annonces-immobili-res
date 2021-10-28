<?php
session_start();

    require_once("configs/database.php");
    require_once("components/header.php");
    require_once("components/nav-bar.php");
    require_once("functions/getUser.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Ajouter une Annonce</h1>

            <form action="functions/addAdvert.php" method="POST" class="form-group">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Entrez un Titre">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="image" class="form-control" placeholder="Entrez l'url de l'image">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Entrez le Prix">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Entrez un statut (Vente ou Location)">
                </div>
                <br>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Entrez une description"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="location">Localisation de l'Annonce :</label>
                    <select name="location" class="form-control">
                        <option value="Dakar">Dakar</option>
                        <option value="Thiès">Thiès</option>
                        <option value="Diamniadio">Diamniadio</option>
                        <option value="Mbour">Mbour</option>
                    </select>
                </div>
                <br>
                <input type="submit" value="Créer Mon Annonce" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<br><br>

