<?php
class CompMenu {
    private $menuContent;

    public function __construct() {
        $this->menuContent = '<nav><ul>';
        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=tours">Tours</a></li>';
        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=ennemis">Ennemis</a></li>';
        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=classement">Classement</a></li>';
        $utilisateurConnecte = isset($_SESSION['user_id']); 

        if ($utilisateurConnecte) {
            $this->menuContent .= '<li><a class="menu-button" href="index.php?module=ami&action=ami">Amis</a></li>';
            $this->menuContent .= '<li><a href="index.php?module=connexion&action=deconnexion"><div class="deconnexion-icon"></div></a></li>';

        } else {
            $this->menuContent .= '<li><a href="index.php?module=connexion&action=connexion"><div class="connexion-icon"></div></a></li>';
        }
        
        $this->menuContent .= '</ul></nav>';
    }

    public function affiche() {
        echo $this->menuContent;
    }
}
?>
