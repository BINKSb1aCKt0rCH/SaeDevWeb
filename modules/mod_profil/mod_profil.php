<?php
require_once "modules/mod_profil/cont_profil.php";

class ModProfil{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContProfil();
        $this->controleur->exec();
    }
    public function getAffichage(){
        $affichage = $this->controleur->getAffichage();
        return $affichage;
    }
}
?>