<?php 
    session_start(); 
    require_once("configs/database.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contactez-Nous</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/icomoon.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body style="background-color: burlywood;">

<?php 
    require_once("components/header.php");
    require_once("components/nav-bar.php");
 ?>

    <div class="page-title" style="background-image: url(dist/images/page-title.jpg);">
        <br>
        <br>
            <div class="large-title text-center">        
                <h2>Veuillez remplir le formulaire ci-dessous</h2>
            </div>
        <br>
        <br>
    </div>

    <section id="contact-page">
        <div class="container">
            <br><br>
            <div class="row contact-wrap" align="center" style="background-image: url(dist/images/background.jpg);"> 
                <div class="status alert alert-success" style="display: none;"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-md-5 col-md-offset-1">
                        <br>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Nom Complet*" class="form-control" required="required">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Adresse Email*" class="form-control" required="required">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" placeholder="N° de Téléphone" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" placeholder="Nom de la Compagnie" class="form-control">
                        </div>
                        <br>                     
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Sujet*" class="form-control" required="required">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="message" placeholder="Message*" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>
                        <br>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success btn-lg form-control" required="required">Envoyer</button>
                        </div>
                        <br>
                    </div>
                </form> 
            </div>
            <br><br>
        </div><!--/.container-->
    </section>

    <!--/#bottom-->
     <?php require_once ('footer.php'); ?>
    <!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
