<?php
  session_start(); 

  require_once("configs/database.php"); 
  
  if (!empty($_POST)) {
    extract($_POST);
    $valid = true;

    if (isset($_POST['avatar'])) {
      if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
        $filename = $_FILES['file']['tmp_name'];

        list($width_orig, $height_orig) = getimagesize($filename);

        if($width_orig >= 500 && $height_orig >= 500 && $width_orig <= 6000 && $height_orig <= 6000) {
            $ListeExtension = array('jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'png' => 'image/jpeg', 'gif' => 'image/gif');
            $ListeExtensionIE = array ('jpg' => 'image/pjpg', 'jpeg' => 'image/pjpeg');
            $tailleMax = 2542888;
            $extensionsValides = array('jpg', 'jpeg'); // Format Accepté

          if($_FILES['file']['size'] <= $tailleMax) {
              $extensionUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1)); 
              if(in_array($extensionUpload, $extensionsValides)) {
                $dossier = "public/avatars/" . $_SESSION['id'] . "/";
                if(!is_dir($dossier)){
                  mkdir($dossier);
                }else{
                  if(file_exists("public/avatars/". $_SESSION["id"] . "/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])){
                    unlink("public/avatars/" . $_SESSION['id'] . "/" . $_SESSION['avatar']);
                  }
                }
                
                $nom = md5(uniqid(rand(), true));
                $chemin = "public/avatars/" . $_SESSION['id'] . "/" . $nom . "." . $extensionUpload;
                $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);

              if ($resultat) {
                if (is_readable("public/avatars/" . $_SESSION['id'] . "/" . $extensionUpload)) {
                  $verif_ext = getimagesize("public/avatars/" . $_SESSION['id'] . "/" . $extensionUpload);
                  if (verif_ext['mime'] == $ListeExtension($extensionUpload) || $verif_ext['mime'] == $ListeExtensionIE($extensionUpload)) {
                    $filename = "public/avatars/" . $_SESSION['id'] . "/" . $nom . "." . $extensionUpload;
                    if ($extensionUpload == 'jpg' || $extensionUpload = 'jpeg' || $extensionUpload = 'pjpg' || $extensionUpload = 'pjpeg') {
                      $image2 = imagecreatefromjpeg($filename);

                      $width2 = 500;
                      $height2 = 500;

                      list($width_orig, $height_orig) = getimagesize($filename);

                      $image_p2 = imagecreatetruecolor($width2, $height2);
                      imagealphablending($image_p2, false);
                      imagesavealpha($image_p2 , true);

                      $point = "";
                      $ratio = null;
                      if ($width_orig <= $height_orig) {
                        $ratio = $width2 / $width_orig;
                      }elseif ($width_orig > $height_orig) {
                        $ratio = $height2 / $height_orig;
                      }

                      $height2 = ($height_orig + $ratio) + 1;
                      $width2 = ($width_orig + $ratio) + 1;

                      imagecopyresampled($image_p2, $image2, 0, 0, $point2, 0, $width2, $height2, $width_orig, $height_orig);

                      imagedestroy($image2);

                      if ($extensionUpload == 'jpg' || $extensionUpload = 'jpeg' || $extensionUpload = 'pjpg' || $extensionUpload = 'pjpeg') {
                        header('Content-Type: image/jpeg');

                        $exif = exif_read_data($filename);

                      if (empty($exif['Orientation'])) {
                        switch ($exif['Orientation']) {
                          case 0:
                            $image_p2 = imagerotate($image_p2, 90, 0);
                          break;
                          case 3:
                            $image_p2 = imagerotate($image_p2, 180, 0);
                          break;
                          case 6:
                            $image_p2 = imagerotate($image_p2, -90, 0);
                          break;
                        }
                      }

                  imagejpeg($image_p2, "public/avatars/" . $_SESSION['id'] . "/" . $nom . "." . $extensionUpload, 75);
                  imagedestroy($image_p2);
                }

                if(file_exists("public/avatars" . $_SESSION['id'] . $_SESSION['avatar'] && isset($_SESSION['avatar']))){
                  unlink("public/avatars" . $_SESSION['id'] . $_SESSION['avatar']);
                }

                $db->prepare('UPDATE utilisateur SET avatar = ? where id = ?');

                $_SESSION['avatar'] = ($nom.".".$extensionUpload);

                header('Location: profil.php');
                exit;

                }else{
                  $_SESSION['flash']['warning'] = "Le type MIME de l'image n'est pas bon";
                }
              }
            }else
              $_SESSION['flash']['error'] = "Erreur lors de l'importation de la photo";
            }else
              $_SESSION['flash']['warning'] = "Votre Photo doit être au format .jpg";
            }else
              $_SESSION['flash']['warning'] = "Votre Photo de Profil ne doit pas dépasser 5Mo";
            }else
              $_SESSION['flash']['warning'] = "Dimension de la Minimum 400 x 400 et Maximum 6000 x 6000";
            }else
              $_SESSION['flash']['warning'] = "Veuillez Mettre une image";
            }elseif(isset($_POST['dltav'])) {
              
            if (file_exists("public/avatars/" . $_SESSION['id'] . "/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])) {
               unlink("public/avatars/" . $_SESSION['id'] . $_SESSION['avatar']);
               rmdir("public/avatars/" . $_SESSION['id'] . "/");

               $DB->prepare('UPDATE utilisateur SET avatar = ? where id = ?');

               $_SESSION['avatar'] = NULL;
             }

            $_SESSION['flash']['success'] = "Votre Avatar à été Supprimé ";
            header('Location: profil.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Mon profil</title>
  </head>
  <body>

  <div class="container">
  <div class="row">

    <div class="col-sm-0 col-md-2 col-lg-3"></div>
    <div class="col-sm-12 col-md-8 col-lg-6">

      <div class="cdr-ins"></div>
        <br>
        <h2 style="text-align: center">Voici le profil de <?= $afficher_profil['nom'] . $afficher_profil['prenom']; ?></h2>

          <div style="margin: 20px 0">
              <?php
                if (file_exists("public/avatars/". $_SESSION['id'] . "/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])){
              ?>
                <img src="<?= "public/avatars/". $_SESSION['id'] . "/" . $_SESSION['avatar']; ?>" width="120" class="sz-image"/>
              <?php
                }else{
              ?>
                <img src="public/avatars/default/avatar.png" width="120" class="sz-image">
              <?php
                }
              ?>
          </div>

          <span class="image-upload">
              <form method="post" enctype="multipart/form-data">
                  <label for="file" style="margin-bottom: 0; margin-top: 5px; display: inline-flex;">
                    <input id="file" type="file" name="file" class="hide-upload" required/>
                    <i class="fa fa-plus image-plus"></i>
                    <input type="submit" class="fa send-upload" name="avatar" value="Envoyer">
                  </label>
                </form>
          </span>

          <div style="border-top: 2px solid #eee; margin-top: 20px; padding-top: 20px;"> 
               <form method="post">
                <label><b>Supprimer l'Avatar</b></label>
                <input type="submit" class="fa send-upload" name="dltav" value="Supprimer">
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>