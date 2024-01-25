<?php
class CompMenu {
    private $menuContent;

    public function __construct() {
        $this->menuContent = '<nav><ul>';

        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=tours&action=tours">Tours</a></li>';
        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=monstres&action=monstres">Monstres</a></li>';
        $this->menuContent .= '<li><a class="menu-button" href="index.php?module=classement&action=afficher">Classement</a></li>';

        $utilisateurConnecte = isset($_SESSION['user_id']); 

        if ($utilisateurConnecte) {
            $this->menuContent .= '<li><form action="rechercheJoueur.php" method="get"></li>';
            $this->menuContent .= '<li><input type="text" class="search-bar" name="nomJoueur" placeholder="Rechercher un joueur..."></li>';
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
