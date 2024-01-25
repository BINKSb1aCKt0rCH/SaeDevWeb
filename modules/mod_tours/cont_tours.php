<?php

require_once 'modules/mod_tours/modele_tours.php';
require_once 'modules/mod_tours/vue_tours.php';

class ControleurTours{
    private $modele;
    private $vue;
    private $action;
    public function __construct(){
        $this->modele = new ModeleTours();
        $this->vue = new VueTours();
        $this->action = isset($_GET['action']) ? $_GET['action'] : '';
    }

    public function affiche(){
        $tab = $this->modele->getAllTours();
        return $this->vue->afficheTours($tab);
    }

    public function exec(){
        switch($this->action){
            case'tours' : 
                $this->affiche();
        }
    }

    public function getAffichage(){
        return $this->vue->getAffichage();
    }

}

?>