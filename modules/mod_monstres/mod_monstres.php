<?php
require_once 'modules/mod_monstres/cont_monstres.php';

class ModuleMonstres {

    private $controleur;

    public function __construct(){
        $this->controleur = new ControleurMonstres();
        $this->controleur->exec();
    }

    public function getAffichage(){
        $affichage = $this->controleur->getAffichage();
        return $affichage;
    }

}


?>