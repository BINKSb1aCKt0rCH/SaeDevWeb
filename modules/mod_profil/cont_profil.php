<?php
require_once 'modele_profil.php';
require_once 'vue_profil.php';
class ContProfil{
private $modele;
private $vue;
private $action;
public function __construct(){
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();
        $this->action = isset($_GET['action']) ? $_GET['action'] : '';
    }
    public function profil(){
        if(isset($_POST['nomJoueur'])){
            $nomJ = $_POST['nomJoueur'];
            $id = $this->modele->getIdJoueur($nomJ);
            $description = $this->modele->getDescription($id);
            $pseudo = $this->modele->getPseudo($id);
            $logo = $this->modele->logo($id);
            $succes = $this->modele->getSucces($id);
            $this->vue->affiche($logo,$pseudo,$description,$succes);
        }
        
    }
    public function exec(){
        switch($this->action){
            case 'profil':
                $this->profil();
            break;
            case'AjoutAmi':
                
        }
        
    }
    public function getAffichage(){
       return $this->vue->getAffichage();
    }
}
?>