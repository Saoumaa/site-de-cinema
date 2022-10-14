<?php 
session_start();


$cnx=new mysqli("localhost","root","root","cinema");
	/*if(!$cnx){
		echo "echec";
		exit();
	}else{
		echo "yes";
	}

*/

 ?>





<html>

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
    <div class="col-sm-0 col-md-2 col-lg-3"></div>
    <div class="col-sm-12 col-md-8 col-lg-6">
      <h1 style="text-align: center">RECHERCHE UN FILM </h1>
      <div class="form-group">
        <input class="form-control" type="text" id="search" value="" placeholder="Rechercher"/>
      </div>
      <div style="margin-top: 20px">
        <div id="result-search"></div> <!-- C'est ici que nous aurons nos résultats de notre recherche -->
      </div>
    </div>
  </div>

    	<form action="note.php" method="post">
                <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Commentaire</label>
                          <textarea placeholder="Commentaire" id="message" class="form-control input-lg" name="commentaire" rows="3"></textarea>
                      </div>
                    
                    
                      <div class="form-group col-md-6">
                          <label for="inputPassword4">NOTE</label>
                          <input type="text" class="form-control" placeholder="note" name="note">
                      </div>
                                <label>Selectionner le flim:</label>
                                  <select style="width:300px" name="titre">
                                    
                                    <option></option>
                                      <?php

                                          $queryy= "Select titre  FROM film;";
                                          $result= mysqli_query($cnx,$queryy);

                                          while ($row=$result->fetch_array(MYSQLI_BOTH)) {
                                              $reponse=$row[0];
                                              
                                              echo "<option value='".$reponse."' >$reponse<option>";
                                          }

                                      ?>

                                  </select> <br>
                    </div>
                    <button type="submit" class="btn btn-primary" name="envoyer">envoyer</button>

									
							</form>	
  







    <a href='deconexion.php' class="btn btn-success"><span>Déconnexion</span></a>
    <a href='preference.php' class="btn btn-danger"><span>Preference</span></a>
    <a href='supri.php' class="btn btn-danger"><span>Supprimer compte</span></a>
</div>

<footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>



</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
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
    
    <script>

  $(document).ready(function(){
    $('#search').keyup(function(){
      $('#result-search').html('');
 
      var reqs = $(this).val();
 
      if(reqs != ""){
        $.ajax({
          type: 'GET',
          url: 'recherche.php',
          data: 'search=' + encodeURIComponent(reqs),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            }else{
              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucune recherche </div>"
            }
          }
        });
      }
    });
  });
</script>


</body>

</html>