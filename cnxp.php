
<?php

$serveur = "localhost";
    $login ="root";
    $pas ="root";


    $connexion = new PDO("mysql:host=$serveur;dbname=cinema",$login,$pas);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ?>