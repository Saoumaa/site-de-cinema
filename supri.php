<?php
session_start();
include('cnxp.php');
$idi = $_SESSION['id'];


    
    
    $req = $connexion->prepare("DELETE FROM `utilisateur` WHERE `id`  = $idi");
    
       $req->execute();

//$afficher_profil = $DB->query("SELECT * FROM `utilisateur` WHERE id = $id");
//$afficher_profil = $afficher_profil->fetch();
//$DB->insert("DELETE FROM `utilisateur` WHERE `id`  = $idi");

/*   SELECT * FROM `film` LEFT JOIN acteur ON film.id_a = acteur.id LEFT JOIN realisateur ON realisateur.id= film.id_re  WHERE titre AND nom_a AND prenom_a AND nom_r AND prenom_r LIKE ?
      LIMIT 10*/


header('Location:deconexion.php');
exit;
?>