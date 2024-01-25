<?php
require_once "modules/mod_classement/classement_cont.php";

class ModClassement{
    private $controleur;
    public function __construct(){
        $this->controleur = new ClassementControleur();
        $this->controleur->exec();
    }
    public function getAffichage(){
        $affichage = $this->controleur->getAffichage();
        return $affichage;
    }
}
?>