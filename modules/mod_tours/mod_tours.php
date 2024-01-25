<?php
require_once 'modules/mod_tours/cont_tours.php';

class ModuleTours {

    private $controleur;

    public function __construct(){
        $this->controleur = new ControleurTours();
        $this->controleur->exec();
    }

    public function getAffichage(){
        $affichage = $this->controleur->getAffichage();
        return $affichage;
    }

}


?>