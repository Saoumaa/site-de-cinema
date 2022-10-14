<?php
  session_start();
  require_once('cnx.php');
 
  if(isset($_GET['search'])){
    $search = (String) trim($_GET['search']);
 
    $req = $DB->query("SELECT *
      FROM film
      WHERE titre LIKE ?
      LIMIT 10",
      array("$search%"));
 
    $req = $req->fetchALL();
  
    foreach($req as $r){
      ?>   
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['titre'] . " " . $r['duree'] ?></div><?php    
    }
  } 

  /*SELECT film.titre FROM `film` WHERE film.titre LIKE "%f"
UNION
SELECT acteur.nom_a FROM acteur WHERE acteur.nom_a LIKE "%f"
UNION 
SELECT acteur.prenom_a FROM acteur WHERE acteur.prenom_a LIKE "%f"
UNION
SELECT realisateur.nom_r FROM realisateur WHERE realisateur.nom_r LIKE "%f"
UNION
SELECT realisateur.prenom_r FROM realisateur WHERE realisateur.prenom_r LIKE "%f" ; */



/*

SELECT * FROM film  ,acteur , realisateur  WHERE realisateur.nom_r LIKE "mo%" OR realisateur.prenom_r LIKE "mo%"OR acteur.nom_a LIKE "mo%" OR acteur.prenom_a LIKE "mo%" OR film.titre LIKE "mo%"

*/
?>


