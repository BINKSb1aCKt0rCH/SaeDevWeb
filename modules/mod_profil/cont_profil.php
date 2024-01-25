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
    public function modif(){
        
        if(isset($_POST['submit'])){
            //$nomJ = isset($_POST["nom"]) ? $_POST["nom"] : "";
            $nomJ = $_POST["nomJoueur"];
            $desc = $_POST["description"];
            //$idJ = isset($_POST["idJoueur"]) ? $_POST["idJoueur"] : var_dump($_POST);
            $idJ = $this->modele->getIdJoueur($nomJ);
            $idJ2 = $_POST["idJoueur"];
            if($this->modele->modifierProfil($idJ,$desc,$nomJ)){
                $this->vue->confirmModif();
            }else{
                $this->vue->erreurBD();
            }
            if($_FILES["avatar"]["name"] !=""){
                echo "files";
                $chemin = "images/".$idJ ."name";
                move_uploaded_file ($_FILES["avatar"]["tmp_name"], $chemin);
                if($this->modele->logo($idJ,$chemin))
                    $this->vue->confirmModif();
                else    
                    $this->vue->erreurBD();
                    //unlink("images/").$idJ ."name";
            }
        }
    }
    private function formModif(){
        $idJ = isset($_POST["idJoueur"]) ? $_POST["idJoueur"] : "erreur";
        $donnees = $this->modele->get_details($idJ);
        /*
        if(!$donnees){
            echo 'oh mince';
            die("Erreur dans la récuperation des données du profil");
        }*/
        $this->vue->modifierProfil($donnees);
    }
    public function exec(){
        switch($this->action){
            case 'profil':
                $this->profil();
            break;
            case'modif':
                $this->modif();
                break;
            case'formModif':
                $this->formModif();
                break;
        }
        
    }
    public function getAffichage(){
       return $this->vue->getAffichage();
    }
}
?>