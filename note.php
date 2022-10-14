<?php 

session_start();
require_once('cnxp.php');
 
if(isset($_POST['envoyer'])) {

    $idu = $_SESSION['email'];
   $titre = $_POST['titre'];
   $note = $_POST['note'];
   $commentaire = $_POST['commentaire'];

   

  

   if(!empty($_POST['commentaire']) AND !empty($_POST['note']) AND !empty($_POST['titre']) ) {
    $reqs = $connexion->prepare("select `idFim` FROM film where titre =  '$titre'");
    $rqs = $connexion->prepare("select `id` FROM utilisateur where email = '$idu'");
     $reqs->execute();
  

    $rqs->execute();

  
   
    $idu= $rqs->fetch();
    $idFim = $reqs->fetch();
    $idFi = $idFim[0];
    $idi = $idu[0];
     
    
    $req = $connexion->prepare("INSERT INTO noter  (idFim , idUtilisateur , note ,commentaires ) VALUES (:idFim,:idUtilisateur,:note,:commentaires)");
    $req->bindParam(':idFim', $idFi);
    $req->bindParam(':idUtilisateur', $idi);
    $req->bindParam(':note', $note);
    $req->bindParam(':commentaires', $commentaire);


    
    $req->execute();

    header("location:back_office.php");
    

   }
    
  

     
    
    }
?>