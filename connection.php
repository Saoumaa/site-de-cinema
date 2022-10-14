<?php
session_start();
include('cnx.php'); // Fichier PHP contenant la connexion à votre BDD
 
// S'il y a une session alors on ne retourne plus sur cette page  
if (isset($_SESSION['id'])){
header('Location: index.php');
exit;
}
 
// Si la variable "$_Post" contient des informations alors on les traitres
if(!empty($_POST)){
extract($_POST);
$valid = true;
 
if (isset($_POST['connexion'])){
$mail = htmlentities(strtolower(trim($mail)));
$mdp = trim($mdp);
 
if(empty($mail)){ // Vérification qu'il y est bien un mail de renseigné
$valid = false;
$er_mail = "Il faut mettre un mail";
}
 
if(empty($mdp)){ // Vérification qu'il y est bien un mot de passe de renseigné
    $valid = false;
$er_mdp = "Il faut mettre un mot de passe";
}
 
// On fait une requête pour savoir si le couple mail / mot de passe existe bien car le mail est unique !
$req = $DB->query("SELECT * FROM `utilisateur` WHERE email ='$mail' and mdp = '$mdp' ");
$req = $req->fetch();
 
// Si on a pas de résultat alors c'est qu'il n'y a pas d'utilisateur correspondant au couple mail / mot de passe
if ($req['id'] == ""){
$valid = false;
$er_mail = "Le mail ou le mot de passe est incorrecte";

header('location: logiin.php');
}
 

 
// S'il y a un résultat alors on va charger la SESSION de l'utilisateur en utilisateur les variables $_SESSION
if ($valid){
$_SESSION['id'] = $req['id']; // id de l'utilisateur unique pour les requêtes futures
$_SESSION['nom'] = $req['nom'];
$_SESSION['prenom'] = $req['prenom'];
$_SESSION['email'] = $req['email'];
 
header('Location:back_office.php');
exit;
  }
}
}
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
    <header id="header" class="transparent-nav">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="index.html">
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
                <h1 id="text">CONNEXION</h1>
               
                
        <form method="post">

        <?php

// S'il y a une erreur sur le nom alors on affiche

if (isset($er_mail)){

?>

    <div><?= $er_mail ?></div>

<?php   

}

?>
<div class="form-row">
        <div class="form-group col-md-6">
                            <label for="inputEmail4" id="text">Email</label>
<input type="email" class="form-control" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>
</div>
</div>            
<?php if (isset($er_mdp)){?>                
                <div><?= $er_mdp ?></div>
<?php
}
?>   
 
 <div class="form-row">               
<div class="form-group col-md-6"> 
                        <label for="inputEmail4">Mots de passe</label>        
<input type="password" class="form-control" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
</div>
</div>
                            
<button type="submit" class="btn btn-primary" name="connexion">Se connecter</button>
</form>
            </div>
        </div>


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