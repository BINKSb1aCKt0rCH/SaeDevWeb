<?php
require_once 'modules/mod_accueil/modele_accueil.php';
require_once 'modules/mod_accueil/vue_acceuil.php';

class ControleurAccueil{
    private $vue;
    private $action;

    public function __construct(){
        $this->vue = new VueAccueil();
        $this->action =isset($_GET['action']) ? $_GET['action'] : '';
    }

    public function affiche(){
        return $this->vue->bienvenue();
    }

    public function exec(){
        switch($this->action){
            case'accueil' :
                $this->affiche();
        }
    }


    public function getAffichage(){
        return $this->vue->getAffichage();
    }


}



?>