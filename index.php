<?php

require_once('cnxp.php');

$reponse = $connexion->query(' SELECT * FROM `film` ORDER BY RAND() LIMIT 10 ');


$acteur = $connexion->query('SELECT * FROM  `acteur` ORDER BY RAND() LIMIT 10');



?>


<!DOCTYPE html>

<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cinema &mdash;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="cinema" />
    <meta name="ouroboros" content="" />

    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />


    <link rel="shortcut icon" href="favicon.ico">


    <link href='http://fonts.googleapis.com/css?family=Lato:300,400|Crimson+Text' rel='stylesheet' type='text/css'>
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Superfish -->
    <link rel="stylesheet" href="css/superfish.css">
    <!-- Easy Responsive Tabs -->
    <link rel="stylesheet" href="css/easy-responsive-tabs.css">



    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">



</head>

<body>

    <!-- START #fh5co-header -->
    <!-- Header -->
    <header id="header" class="transparent-nav">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="index.php">
                        <img src="./img/logo-alt.png" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Mobile toggle -->
                <button class="navbar-toggle">
						<span></span>
					</button>
                <!-- /Mobile toggle -->
            </div>

            <!-- Navigation -->
            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="connection.php">connection</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="forum.php">forum</a></li>
                    
                </ul>
            </nav>
            <!-- /Navigation -->

        </div>
    </header>
    <!-- /Header -->

    <!-- START #fh5co-hero -->
    <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>

        

        <div class="container">
            <section id="fh5co-feature-slider">
                <div class="container">
                    <div class="row">

                    <?php 
                

                if(isset($_GET['film'])){ /*SI on est dans une categorie*/
                    $_GET['film'] = htmlspecialchars($_GET['film']);
                    ?>
                      <div class="film">
                      <h1><?php echo $_GET['film']; ?></h1>

                      <?php 
                      $titre= $_GET['film'];
                      
                      $repons = $connexion->query("SELECT * FROM `film` LEFT JOIN acteur ON film.id_a = acteur.id LEFT JOIN realisateur ON realisateur.id= film.id_re WHERE titre = '$titre' ");
                      $donnee = $repons->fetch();
                      
                      ?>
                             <div class="item">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1">
                                            <div class="row">
                                                 <div class="col-md-9 col-sm-3 col-xs-6 col-xxs-12 fh5co-item-slide-img">
                                                    <img src="<?php echo $donnee['photo']; ?> " height="352" width="470">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-slide-text">
                                                <p>Duree : <?php echo $donnee['duree']; ?>
                                                    <p>Annee : <?php echo $donnee['annee']; ?>
                                                    <p>Pays : <?php echo $donnee['codeIso']; ?>
                                                    </p>
                                                    <p>Nom acteur : <?php echo $donnee['nom_a']; ?>
                                                    </p>
                                                    <p>Prenom acteur : <?php echo $donnee['prenom_a']; ?>
                                                    </p>
                                                    <p>Nom realisateur : <?php echo $donnee['nom_r']; ?>
                                                    </p>
                                                    <p>Prenom realisateur : <?php echo $donnee['prenom_r']; ?>
                                                    </p>
                                                    </div>


                    
                   
                                        </div>
                                    </div>
                                </div>


                    
                    <?php
                    }else {
                    
                        ?>
                        <div class="col-md-12">


                            <div class="owl-carousel-fullwidth owl-carousel-2">
                               
                                <?php   while ($donnees = $acteur->fetch()){ ?>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-slide-img">
                                                    <img src="<?php echo $donnees['photos']; ?> " height="352" width="470">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-slide-text">
                                                   <a href="index.php?acteur=<?php echo $donnees['nom_a']; ?>"> <h2><?php echo $donnees['nom_a']; ?><span class="fh5co-border"></span></h2> </a>
                                                    <p>Prenom : <?php echo $donnees['prenom_a']; ?>
                                                   
                                                    <p>Pays : <?php echo $donnees['code_iso']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }

                                $acteur->closeCursor(); 

                                ?>                



                    </div>

                    
                    <?php 
                }
                ?>
                </div>
            </section>

        </div>

                                


        <div class="fh5co-spacer fh5co-spacer-xlg"></div>

     
        <div class="container">
            <section id="fh5co-feature-slider">
                <div class="container">
                    <div class="row">

                    <?php 
                

                if(isset($_GET['acteur'])){ /*SI on est dans une categorie*/
                    $_GET['acteur'] = htmlspecialchars($_GET['acteur']);
                    ?>
                      <div class="acteur">
                      <h1><?php echo $_GET['acteur']; ?></h1>

                      <?php 
                      $nom= $_GET['acteur'];
                      
                      $repon = $connexion->query("SELECT * FROM `film` LEFT JOIN acteur ON film.id_a = acteur.id LEFT JOIN realisateur ON realisateur.id= film.id_re WHERE nom_a = '$nom' ");
                      $donnee = $repon->fetch();
                      
                      ?>
                             <div class="item">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1">
                                            <div class="row">
                                                 <div class="col-md-9 col-sm-3 col-xs-6 col-xxs-12 fh5co-item-slide-img">
                                                    <img src="<?php echo $donnee['photos']; ?> " height="352" width="470">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-slide-text">
                                                <p>Film  : <?php echo $donnee['titre']; ?>
                                                    <p>Annee : <?php echo $donnee['annee']; ?>
                                                    <p>Nationalité : <?php echo $donnee['code_iso']; ?>
                                                    </p>
                                                    <p>Nom acteur : <?php echo $donnee['nom_a']; ?>
                                                    </p>
                                                    <p>Prenom acteur : <?php echo $donnee['prenom_a']; ?>
                                                    </p>
                                                    
                                                    </div>


                    
                   
                                        </div>
                                    </div>
                                </div>


                    
                    <?php
                    }else {
                    
                        ?>
                        <div class="col-md-12">


                            <div class="owl-carousel-fullwidth owl-carousel-2">
                               
                                <?php   while ($donnees = $reponse->fetch()){ ?>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-slide-img">
                                                    <img src="<?php echo $donnees['photo']; ?> " height="352" width="470">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-slide-text">
                                                   <a href="index.php?film=<?php echo $donnees['titre']; ?>"> <h2><?php echo $donnees['titre']; ?><span class="fh5co-border"></span></h2> </a>
                                                    <p>Dure : <?php echo $donnees['duree']; ?>
                                                    <p>Annee : <?php echo $donnees['annee']; ?>
                                                    <p>Pays : <?php echo $donnees['codeIso']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }

                                $reponse->closeCursor(); 

                                ?>                



                    </div>

                    
                    <?php 
                }
                ?>
                </div>
            </section>

        </div>

        <div class="fh5co-spacer fh5co-spacer-xlg"></div>

        <section>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<div class="fh5co-spacer fh5co-spacer-sm"></div>
							</div>
							<div class="col-md-12">
								<img src="images/hero3.jpg" alt="Images" class="fh5co-align-left img-responsive">
								<p>Le cinéma est un art du spectacle. En français, il est couramment désigné comme le « septième art », d'après l'expression du critique Ricciotto Canudo dans les années 19201. L’art cinématographique se caractérise par le spectacle proposé au public sous la forme d’un film, c’est-à-dire d’un récit (fictionnel ou documentaire), véhiculé par un support (pellicule souple, bande magnétique, contenant numérique) qui est enregistré puis lu par un mécanisme continu ou intermittent qui crée l’illusion d’images en mouvement, ou par un enregistrement et une lecture continus de données informatiques. La communication au public du spectacle enregistré, qui se différencie ainsi du spectacle vivant, se fait à l’origine par l’éclairement à travers le support, le passage de la lumière par un jeu de miroirs ou/et des lentilles optiques, et la projection de ce faisceau lumineux sur un écran transparent (Émile Reynaud, Thomas Edison) ou opaque (Louis Lumière), ou la diffusion du signal numérique sur un écran plasma ou à led. Au sens originel et limitatif, le cinéma est la projection en public d’un film sur un écran (en salle ou en plein-air). Dès Émile Reynaud, en 1892, les créateurs de films comprennent que le spectacle projeté gagne à être accompagné par une musique qui construit l’ambiance du récit, ou souligne chaque action représentée. Très rapidement, ils ajoutent des bruits provoqués par un assistant à l’occasion de chaque projection, et font commenter les actions par un bonimenteur présent lui aussi dans la salle. Depuis son invention, le cinéma est devenu à la fois un art populaire, un divertissement, une industrie et un média. Il peut aussi être utilisé à des fins publicitaires, de propagande, de pédagogie ou de recherche scientifique ou relever d'une pratique artistique personnelle et singulière.!</p>

								<img src="images/hero4.jpg" alt="Images" class="fh5co-align-right img-responsive">
								<p>Le terme « cinéma » est l’abréviation de cinématographe2 (du grec κίνημα / kínēma, « mouvement » et γραϕή / graphê, « art d'écrire, écriture »), nom donné par Léon Bouly à l'appareil de prise de vues dont il dépose le brevet en 1892. N'ayant plus payé les droits les années suivantes, et son invention tournant court, il en perd la propriété et les frères Lumière lui reprennent cette appellation. Antoine Lumière (le père) aurait préféré que la machine de ses fils soit nommée « Domitor », mais Louis et Auguste préférèrent Cinématographe, mot à leur avis plus dynamique. Cependant, le mot d'Antoine revint en 1985, l'Association internationale pour le développement de la recherche sur le cinéma des premiers temps ayant, avec un peu d'humour, surnommé leur association Domitor. Le mot cinéma est polysémique, il peut désigner l’art filmique, ou les techniques des prises de vue animées et de leur présentation au public, ou encore, par métonymie, la salle dans laquelle les films sont montrés. C’est dans cette dernière acception que le terme est lui-même souvent abrégé en français dans le langage familier, en « ciné » ou « cinoche », la référence à l’écran de projection ayant par ailleurs donné l’expression des cinéphiles, « se faire une toile ». Dans le même registre, « se faire son cinéma », « c’est du cinéma » (c’est mensonger ou exagéré), sont des expressions nées du 7e art.

À noter que dès 1891, Thomas Edison nomme caméra Kinétographe l'appareil de prise de vues photographiques animées qu'il a imaginé et que son assistant, William Kennedy Laurie Dickson, met au point, et qui est à l'origine des premiers films du cinéma, dès 1891. Ce terme de kinétographe (d’après le grec ancien kinetos et graphein qui signifient respectivement « mouvement » et « écrire ») sert de base d'appellation du cinéma dans plusieurs langues autres que latines. Kino, aussi bien en allemand qu'en russe, et dans bien d'autres langues3, désigne le cinéma4.

Si les films sont des objets représentatifs de cultures spécifiques dont ils sont le reflet parfois fidèle5, leur diffusion est potentiellement universelle, les récits qu’ils véhiculent sont en effet basés sur les grands sentiments partagés par toute l’humanité. Leur exploitation en salles, favorisée par le sous-titrage ou le doublage des dialogues, est devenue secondaire au niveau commercial, la vente des droits de diffusion aux chaînes de télévision, et leur mise à disposition dans des formats domestiques sont devenues les principales sources de recettes du cinéma.!</p>
							</div>
						</div>
						<div class="fh5co-spacer fh5co-spacer-lg"></div>
					</div>
				</section>


        

                <footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>


    </div>

 <!-- Style -->    
 <script src="js/script.js"></script>
    <!-- jQuery -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.js"></script>
    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Superfish -->
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.js"></script>
    <!-- Easy Responsive Tabs -->
    <script src="js/easyResponsiveTabs.js"></script>
    <!-- FastClick for Mobile/Tablets -->
    <script src="js/fastclick.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

</body>

</html>