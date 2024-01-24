<?php

require_once 'modules/mod_monstres/modele_monstres.php';
require_once 'modules/mod_monstres/vue_monstres.php';

class ControleurMonstres{

    private $modele;
    private $vue;
    private $action;
    
    public function __construct(){
        $this->modele = new ModeleMonstres();
        $this->vue = new VueMonstres();
        $this->action = isset($_GET['action']) ? $_GET['action'] : '';
    }

    public function affiche(){
        $tab = $this->modele->getAllMonstres();
        return $this->vue->afficheMonstres($tab);
    }

    public function exec(){
        switch($this->action){
            case'monstres' : 
                $this->affiche();
        }
    }

    public function getAffichage(){
        return $this->vue->getAffichage();
    }

}

?>