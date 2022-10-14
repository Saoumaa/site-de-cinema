
<?php session_start();
    include_once 'function/function.php';
    include_once 'function/addPost.class.php';
    $bdd = bdd();

    if(!isset($_SESSION['email'])){

        header('Location: inscription.php');
    }
    else {
        
        if(isset($_POST['name']) AND isset($_POST['sujet'])){
        
        $addPost = new addPost($_POST['name'],$_POST['sujet']);
        $verif = $addPost->verif();
        if($verif == "ok"){
            if($addPost->insert()){
                
            }
        }
        else {/*Si on a une erreur*/
            $erreur = $verif;
        }
        
    }
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Site &mdash; </title>



  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Google Webfont -->
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

           
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-lead-wrap">
                        <h2 class="fh5co-serif fh5co-lead"><a href="#">Bienvenue sur mon super forum !</a>  </h2>
                        <div class="fh5co-spacer fh5co-spacer-sm"></div>
                        
                    </div>
                </div>
            </div>		
            <div class="container">
            <div class="row">
            <div class="col-md-8 col-md-offset-2 text-justify fh5co-lead-wrap">
                <?php 
                

                if(isset($_GET['categorie'])){ /*SI on est dans une categorie*/
                    $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
                    ?>
                    <div class="categories">
                      <h1><?php echo $_GET['categorie']; ?></h1>
                    </div>
               <h3> <a href="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">Ajouter un sujet</a> </h3>
                <?php 
                $requete = $bdd->prepare('SELECT * FROM sujet WHERE categorie = :categorie ');
                $requete->execute(array('categorie'=>$_GET['categorie']));
                while($reponse = $requete->fetch()){
                    ?>
                     <div class="categories">
                        <h3> <a href="forum.php?sujet=<?php echo $reponse['nom'] ?>"><h1><?php echo $reponse['nom'] ?></h1></a> </h3>
                    </div>
                    <?php
                }
                ?>
                
                    
                    <?php
                }
                
                else if(isset($_GET['sujet'])){ /*SI on est dans une categorie*/
                    $_GET['sujet'] = htmlspecialchars($_GET['sujet']);
                    ?>
                    <div class="categories">
                      <h1><?php echo $_GET['sujet']; ?></h1>
                    </div>
                
                <?php 
                $requete = $bdd->prepare('SELECT * FROM postsujet WHERE sujet = :sujet ');
                $requete->execute(array('sujet'=>$_GET['sujet']));
                while($reponse = $requete->fetch()){
                    ?>
                <div class="post">
                    <?php 
                   //  $_SESSION['email'] = $email;
                     $requete2 = $bdd->prepare('SELECT * FROM utilisateur WHERE id = :id');
                     $requete2->execute(array('id'=>$reponse['propri']));
                     $membres = $requete2->fetch();
                     echo $membres['nom']; echo ': <br>';
                     
                     echo $reponse['contenu'];
                    ?>
                 </div> 
                <?php
                   
                }
                ?>
                
                 <form method="post" action="forum.php?sujet=<?php echo $_GET['sujet']; ?>">
                        <textarea name="sujet" placeholder="Votre message..." ></textarea>
                        <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
                        <input type="submit" value="Ajouter à la conversation" />
                        <?php 
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        ?>
                    </form>
                <?php
                }
                else { /*Si on est sur la page normal*/
                    
                       
                
                        $requete = $bdd->query('SELECT * FROM categories');
                        while($reponse = $requete->fetch()){
                        ?>
                            <div class="categories" >
                             <h3>   <a  href="forum.php?categorie=<?php echo $reponse['name']; ?>"><?php echo $reponse['name']; ?></a> </h3>
                              </div>
                
                    <?php 
                    }
                    
                }
                 ?>
                 </div>
                 
                </div>
        </div>
                
    
            
        <footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>


        
    
        </div>
        
        
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

<?php
}
?>
