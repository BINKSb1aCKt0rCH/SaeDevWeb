<?php   
require_once 'cont_connexion.php';
require_once 'modele_connexion.php';
require_once 'vue_connexion.php';

class ModConnexion {
    private $controleur;

    public function __construct() {
        $this->controleur = new ContConnexion();
        $this->controleur->exec();
    }

    public function getAffichage() {
        $affichage = $this->controleur->getAffichage();
        return $affichage;
    }
}
?>
