<?php
class CompMenu {
    private $menuContent;

    public function __construct() {
        $this->menuContent = '<nav><ul>';
        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=tours">Tours</a></li>';
        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=ennemis">Ennemis</a></li>';
        $utilisateurConnecte = isset($_SESSION['user_id']); 

        if ($utilisateurConnecte) {
            $this->menuContent .= '<li><a class="menu-button" href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
        } else {
            $this->menuContent .= '<li><a class="menu-button" href="index.php?module=connexion&action=connexion">Se Connecter</a></li>';
        }
        
        $this->menuContent .= '</ul></nav>';
    }

    public function affiche() {
        echo $this->menuContent;
    }
}
?>
