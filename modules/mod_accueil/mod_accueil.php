<?php
require_once 'modules/mod_accueil/cont_accueil.php';

class ModuleAccueil {

    private $controleur;

    public function __construct(){
        $this->controleur = new ControleurAccueil();
        $this->controleur->exec();
    }



    public function getAffichage(){
        $affichage = $this->controleur->getAffichage();
        return $affichage;
    }
    
}


?>