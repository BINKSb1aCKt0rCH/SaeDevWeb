<?php
include_once('classement_modele.php');
include_once('classement_vue.php');

class ClassementControleur{
    private $modele;
    private $vue;
    private $action;
    public function __construct(){
        $this->modele = new ClassementModele();
        $this->vue = new ClassementVue();
        $this->action = isset($_GET['action']) ? $_GET['action'] : '';
    }
    public function affiche(){
        $tab = $this->modele->getClassement();
        return $this->vue->afficheClassement($tab);
    }
    public function exec(){
        switch ($this->action){
            case "afficher" :
                $this->affiche();
        }
    }
    public function getAffichage(){
        return $this->vue->getAffichage();
    }

}

?>