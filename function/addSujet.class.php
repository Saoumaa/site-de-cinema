<?php include_once 'function.php';

class addSujet{
    
    private $name;
    private $sujet;
    private $categorie;
    private $bdd;
    
    public function __construct($name,$sujet,$categorie) {
        
        $this->name = htmlspecialchars($name);
        $this->sujet = htmlspecialchars($sujet);
        $this->categorie = htmlspecialchars($categorie);
        $this->bdd = bdd();
        
    }
    
    
    public function verif(){
        
        if(strlen($this->name) > 5 AND strlen($this->name) < 60 ){ /*Si le nom du sujet est bon**/
            
            if(strlen($this->sujet) > 0){ /*Si on a bien un sujet*/
                
                return 'ok';
            }
            else {/*Si on a pas de contenu*/
                $erreur = 'Veuillez entrer le contenu du sujet';
                return $erreur;
            }
            
        }
        else { /*Si le nom du sujet est mauvais*/
            $erreur = 'Le nom du sujet doit contenir entre 5 et 20 caractères';
            return $erreur;
        }
        
    }
    
    public function insert(){
        
        $requete = $this->bdd->prepare('INSERT INTO sujet( nom ,categorie) VALUES(:nom,:categorie)');
        $requete->execute(array('nom'=> $this->name,'categorie'=>  $this->categorie));


        $idu = $_SESSION['email'];
        $rqs = $this->bdd->prepare("select `id_u` FROM utilisateur where email = '$idu'");
        $rqs->execute();
        $idu= $rqs->fetch();
        $idi = $idu[0];
        
        $requete2 = $this->bdd->prepare('INSERT INTO postsujet(propri,contenu,date,sujet) VALUES(:propri,:contenu,NOW(),:sujet)');
        $requete2->execute(array('propri'=>$idi,'contenu'=>  $this->sujet,'sujet'=>  $this->name));
        
        return 1;
    }
    
}