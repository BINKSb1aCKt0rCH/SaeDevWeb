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
    }
    public function afficherClassement(){
        $tab = $this->modele->getClassement();
        $this->vue->afficheClassement($tab);
    }
    public function exec(){
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "Classement";
        switch ($this->action){
            case "afficher" :
                $this->afficherClassement();
        }
    }

}

?>