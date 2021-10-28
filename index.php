<?php
     session_start();
     require_once (dirname(__FILE__) . "/configs/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Acceuil | Sen Immobilier </title>

    <!-- core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/font-awesome.min.css" rel="stylesheet">
    <link href="dist/css/animate.min.css" rel="stylesheet">
    <link href="dist/css/prettyPhoto.css" rel="stylesheet">
    <link href="dist/css/owl.carousel.min.css" rel="stylesheet">
    <link href="dist/css/icomoon.css" rel="stylesheet">
    <link href="dist/css/main.css" rel="stylesheet">
    <link href="dist/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="dist/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="dist/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="dist/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="dist/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="dist/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
<?php include_once "components/nav-bar.php"; ?>

<div class="page-title" style="background-image: url(dist/images/page-title.jpg);">
    <div class="large-title text-center">        
        <h2><u> Acceuil </u></h2>
    </div>
</div>
<br><br>

    <section id="blog" style="background: #BC8F8F;">
        <div class="blog container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                        <div class="blog-content">
                            <a href="#" class="blog_cat">SEN IMMOBILIER</a>
                            <h2><a href="index2.php">Location et Vente de Maisons</a></h2>
                            <h3>
                                Nous vous proposons toutes sorte de maisons. <br>
                                Nous sommes là pour vous aider à trouver ce que vous recherchez en matière d'immobilier. Vous pouvez aller visiter les Annonces ou en rechercher par Catégories que cela soit pour un appartement à 2, 3 Chambres ou pour un Terrain de plusieurs hectares. 
                            </h3>
                            <a class="readmore" href="index2.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <a href="#"><img class="img-responsive img-blog" src="dist/images/villa.jpg" width="100%" alt="" /></a>
                    </div>
                    <!--/.blog-item-->

                    <div class="blog-item">
                        <div class="blog-content">
                            <a href="#" class="blog_cat">SEN IMMOBILIER</a>
                            <h2><a href="index2.php">Location et Vente d'Appartements</a></h2>
                            <h3>
                                Nous vous proposons toutes sorte de Appartements. <br>
                                Nous sommes là pour vous aider à trouver ce que vous recherchez en matière d'immobilier. Vous pouvez aller visiter les Annonces ou en rechercher par Catégories que cela soit pour un appartement à 2, 3 Chambres ou pour un Terrain de plusieurs hectares. 
                            </h3>                            <a class="readmore" href="index2.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <a href="#"><img class="img-responsive img-blog" src="dist/images/maison4.jpg" width="100%" alt="" /></a>
                    </div>
                    <!--/.blog-item-->

                    <div class="blog-item">
                        <div class="blog-content">
                            <a href="#" class="blog_cat">SEN IMMOBILIER</a>
                            <h2><a href="index2.php">Vente de Terrains</a></h2>
                            <h3>
                                Nous vous proposons toutes sorte de Terrains. <br>
                                Nous sommes là pour vous aider à trouver ce que vous recherchez en matière d'immobilier. Vous pouvez aller visiter les Annonces ou en rechercher par Catégories que cela soit pour un appartement à 2, 3 Chambres ou pour un Terrain de plusieurs hectares. 
                            </h3>                            <a class="readmore" href="index2.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <a href="#"><img class="img-responsive img-blog" src="dist/images/maison5.jpg" width="100%" alt="" /></a>
                    </div>
                    <!--/.blog-item-->
                    
                </div>
                <!--/.col-md-8-->

                <aside class="col-md-4" style="background: #e3e3e3;">
                    <br>
                    <div class="widget search">
                        <form role="form">
                            <div class="form-group">
                              <input type="text" class="form-control search_box" id="search-user" placeholder="Rechercher un Agent Immobilier">
                            </div>
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <div style="margin-top: 20px;">
                                <div id="result-search-user"></div>
                            </div>
                        </form>
                    </div>
                    <!--/.search-->
                    

                    <div class="widget archieve">
                        <h3>Catégories</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                    <li><a href="index2.php">Tout <span class="pull-right">(<?php $req = $db->prepare("SELECT COUNT(*) FROM annonce"); $req->execute();?>)</span></a></li>
                                    <li><a href="advert-maison.php"> Voir toutes les Maisons <span class="pull-right">(<?php $db->prepare("SELECT COUNT(*) FROM annonce WHERE titre = 'maison' OR titre = 'villa' "); ?>)</span></a></li>
                                    <li><a href="advert-appart.php"> Voir tous les Appartements <span class="pull-right">(<?php $db->prepare("SELECT COUNT(*) FROM annonce WHERE titre = 'appartement' "); ?>)</span></a></li>
                                    <li><a href="advert-terrain.php"> Voir tous les Terrains<span class="pull-right">(<?php $db->prepare("SELECT COUNT(*) FROM annonce WHERE titre = 'terrain' "); ?>)</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/.archieve-->

                    <div class="widget popular_post">
                        <h3>Annonces Populaires</h3>
                        <ul>
                            <li>
                                <a href="index2.php">
                                    <img src="dist/images/maison2.png" alt="">
                                    <p>Voir les Annonces</p>
                                </a>
                            </li>
                            <li>
                                <a href="index2.php">
                                    <img src="dist/images/maison1.png" alt="">
                                    <p>Voir les Annonces</p>
                                </a>
                            </li>
                            <li>
                                <a href="index2.php">
                                    <img src="dist/images/maison3.png" alt="">
                                    <p>Voir les Annonces</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/.archieve-->
                    

                    <div class="widget blog_gallery">
                        <h3>Notre Galerie</h3>
                        <ul class="sidebar-gallery clearfix">
                            <li>
                                <a href="#"><img src="dist/images/maison1.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="dist/images/image4.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="dist/images/maison2.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="dist/images/image5.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="dist/images/maison3.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="dist/images/image6.jpeg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="dist/images/image7.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="dist/images/image8.jpg" alt="" /></a>
                            </li>
                            
                        </ul>
                    </div>
                    <!--/.blog_gallery-->
                    
                    <div class="widget social_icon">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                        <a href="#" class="fa fa-pinterest"></a>
                        <a href="#" class="fa fa-github"></a>
                    </div>
                    
                </aside>
            </div>
            
        </div>
    </section>
    <!--/#blog-->



    <section id="bottom" style="background: #e3e3e3;">
        <div class="container fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
            <div class="col-sm-8 col-md-2 col-lg-3"></div>
                <div class="col-sm-12 col-md-8 col-lg-6">
                    <div class="form-group">
                        <h1 style="text-align: center;">Rechercher un Article</h1>
                        <div class="form-group">
                            <input type="text" class="form-control" id="search-item" placeholder="Veuillez entrez votre recherche ici ...">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success form-control">Rechercher</button>
                        </div>
                        <div style="margin-top: 20px;">
                            <div id="result-search"></div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br>
            <hr style="border: solid 3px; border-color: #FF8c00;">
            <br><br>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 offset-2">
                        <div class="widget">
                            <h3><u>Par Expertise</u></h3>
                            <ul>
                                <li><a href="#">Appartements</a></li>
                                <li><a href="#">Maisons</a></li>
                                <li><a href="#">Villas</a></li>
                                <li><a href="#">Hangards</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">Résidences</a></li>
                                <li><a href="#">Terrains</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/.col-md-3-->

                    <div class="col-md-4">
                        <div class="widget">
                            <h3><u>Par Région</u></h3>
                            <ul>
                                <li><a href="#">Dakar</a></li>
                                <li><a href="#">Mbour</a></li>
                                <li><a href="#">Thiès</a></li>
                                <li><a href="#">Diamniadio</a></li>
                                <li><a href="#">Fatick</a></li>
                                <li><a href="#">Kaolack</a></li>
                                <li><a href="#">Louga</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/.col-md-3-->
                </div>
            </div>
        </div>
    </div>
</section>
    <!--/#bottom-->
    
    <?php require_once("components/footer.php"); ?>

    <!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#search-user').keyup(function(){
                $('#result-search-user').html('');

                var utilisateur = $(this).val();

                if (utilisateur != "") {
                    $.ajax({
                        type: 'GET',
                        url: 'functions/recherche_user.php',
                        data: 'user=' + encodeURIComponent(utilisateur),
                        success: function(data){
                            if (data != "") {
                                $('#result-search-user').append(data);
                            }else{
                                document.getElementById('result-search-user').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px;'> Aucun Utilisateur Trouvé</div>"
                            }
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#search-item').keyup(function(){
                $('#result-search').html('');

                var item = $(this).val();

                if (item != "") {
                    $.ajax({
                        type: 'GET',
                        url: 'functions/recherche_item.php',
                        data: 'annonce=' + encodeURIComponent(item),
                        success: function(data){
                            if (data != "") {
                                $('#result-search').append(data);
                            }else{
                                document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px;'> Aucun Produit Trouvé</div>"
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
