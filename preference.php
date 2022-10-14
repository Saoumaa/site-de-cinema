<?php
session_start();
include('cnx.php');
 
if (!isset($_SESSION['id'])){
header('Location: index.php');
exit;
}
 
// On récupère les informations de l'utilisateur connecté
$id = $_SESSION['id'];
$afficher_profil = $DB->query("SELECT * FROM `utilisateur` WHERE id = $id");
$afficher_profil = $afficher_profil->fetch();

if(!empty($_POST)){
extract($_POST);
$valid = true;
 
if (isset($_POST['modification'])){
$nom = htmlentities(trim($nom));
$prenom = htmlentities(trim($prenom));
$mail = htmlentities(strtolower(trim($mail)));
 
if(empty($nom)){
$valid = false;
$er_nom = "Il faut mettre un nom";
}
 
if(empty($prenom)){
$valid = false;
$er_prenom = "Il faut mettre un prénom";
}
 
if(empty($mail)){
$valid = false;
$er_mail = "Il faut mettre un mail";
 
}elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
$valid = false;
$er_mail = "Le mail n'est pas valide";
 
}else{
$req_mail = $DB->query("SELECT email FROM utilisateur WHERE email = ?",
array($mail));
$req_mail = $req_mail->fetch();
 
if ($req_mail['email'] <> "" && $_SESSION['email'] != $req_mail['email']){
$valid = false;
$er_mail = "Ce mail existe déjà";
}
}
 
if ($valid){
 
 
$DB->insert("UPDATE `utilisateur` SET `nom`='$nom',`prenom`='$prenom',`email`='$mail' WHERE id =  $id");
 
$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;
$_SESSION['email'] = $mail;
 
header('Location:back_office.php');
exit;
}}}
?>

 <!DOCTYPE html>
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

    
     <body class="inner-page">
 
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
        <h1 id="text">Modification</h1>

        <form method="post">
            <?php
if (isset($er_nom)){
?>
                    <div><?= $er_nom ?></div>
<?php
}
?>
 <div class="form-row">
 <div class="form-group col-md-6">
  <label for="inputEmail4">Nom</label>
            <input type="text" class="form-control" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>" required>   
</div>            
<?php
if (isset($er_prenom)){?>
                    <div><?= $er_prenom ?></div>
<?php
}?>
<div class="form-group col-md-6">
                            <label for="inputEmail4">Prenom</label>
            <input type="text" class="form-control" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }else{ echo $afficher_profil['prenom'];}?>" required>   
</div>
</div>            
 <?php
if (isset($er_mail)){
?>
                    <div><?= $er_mail ?></div>
<?php
}
?>
<div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }else{ echo $afficher_profil['email'];}?>" required>
</div>
</div>
            <button type="submit"  class="btn btn-primary"name="modification">Modifier</button>
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
 