<?php 
    require_once 'modele_ami.php';
    require_once 'vue_ami.php';

class ContAmi {

    private $vue;
    private $modele;
    private $action;

    function __construct() {
        $this->vue = new VueAmi();
        $this->modele = new ModeleAmi();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "bienvenue" ;
    }

    public function trouveJoueur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomJoueur = isset($_POST['nomJoueur']) ? $_POST['nomJoueur'] : '';
        
		    if (!empty($nomJoueur)) {
                if(!$this->modele->recherche($nomJoueur)){
                    $_SESSION["erreur"] = "Joueur introuvable";
                    $this->demander();
                    $this->vue->affiche_barre();
                    $this->demande();
                } else {
                    $this->demander();
                    $this->vue->affiche_barre();
                    $this->vue->affiche_liste($this->modele->recherche($nomJoueur));
                    $this->demande();
                }
            } else {
                $_SESSION["erreur"] = "Veuillez écrire le nom du joueur";
                $this->demander();
                $this->vue->affiche_barre();
                $this->demande();
            }
        } else {
            $this->vue_connexion->affiche_barre();
            $this->demande();
        }
    }

    function ajouter($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $date = date('Y-m-d H:i:s');
        if (!empty($date)) {
            if ($this->modele->verifdemande($_SESSION['user_id']['idJoueur'], $id)) {
                if($this->modele->verifami($_SESSION['user_id']['idJoueur'], $id)){
                    if($this->modele->verifdemandeami($_SESSION['user_id']['idJoueur'], $id)){
                        if($_SESSION['user_id']['idJoueur'] != $id){
                            $this->modele->ajouterDemandeAmi($_SESSION['user_id']['idJoueur'], $id, $date);
                            $_SESSION["msg"] ="Demande d'ami envoyé";
                            $this->demander();
                            $this->vue->affiche_barre();
                            $this->demande();
                        } else {
                            $_SESSION["erreur"] = "Vous ne pouvez pas envoyer de demande d'ami à vous même.";
                        }
                    } else {
                        $_SESSION["erreur"] = "Vous avez déjà reçu une demande d'ami de ce joueur.";
                    }
                } else {
                    $_SESSION["erreur"] = "Vous êtes déjà amis.";
                }
            } else {
                $_SESSION["erreur"] = "Vous avez déjà envoyé une demande d'ami.";
            }
        } else {
            $_SESSION["erreur"] = "Erreur date.";
        }
    }
        if(isset($_SESSION["erreur"])){
            $this->demander();
            $this->vue->affiche_barre();
            $this->demande();
        }
    }
    
    function demande() {
        if($this->modele->recupererDemandes($_SESSION['user_id']['idJoueur']) === false){
            $_SESSION["message_erreur"] = "Aucune demande d'ami en attente pour le moment.";
        }
        $this->vue->affiche_demandeAmis($this->modele->recupererDemandes($_SESSION['user_id']['idJoueur']));
    }
    

    function accepter() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if (!empty($id)) {
                $_SESSION["msg"] ="Ami ajouté";
                $this->modele->supprimerDemande($id, $_SESSION['user_id']['idJoueur']);
                $this->modele->ajouterAmi($_SESSION['user_id']['idJoueur'], $id);
                $this->demander();
                $this->vue->affiche_barre();
                $this->demande();
                }
        }
        if(isset($_SESSION["erreur"])){
            $this->demander();
            $this->vue->affiche_barre();
            $this->demande();
        }
    }

    function supprimer() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if (!empty($id)) {
                $_SESSION["msg"] ="Ami supprimé";
                $this->modele->supprimerAmi($id, $_SESSION['user_id']['idJoueur']);
                $this->demander();
                $this->vue->affiche_barre();
                $this->demande();
                }
        }
        if(isset($_SESSION["erreur"])){
            $this->demander();
            $this->vue->affiche_barre();
            $this->demande();
        }
    }

    function demander() {
        if($this->modele->recupererAmi($_SESSION['user_id']['idJoueur']) === false){
            $_SESSION["message"] = "Vous n'avez encore ajouté aucun ami.";
        }
        $this->vue->affiche_ami($this->modele->recupererAmi($_SESSION['user_id']['idJoueur']));
    }

    function exec() {

        switch ($this->action) {
            case "bienvenue":
                $this->demander();
                $this->vue->affiche_barre();
                $this->demande();
                break;
            
            case "liste":
                $this->trouveJoueur();
                break;

            case "supprimer":
                $this->supprimer();
                break;
            
            case "accepter":
                $this->accepter();
                break;

            case "refuser":
                $id = isset($_GET['id']) ? $_GET['id'] : "Error" ;
                $this->modele->supprimerDemande($id, $_SESSION['user_id']['idJoueur']);
                $this->demander();
                $this->vue->affiche_barre();
                $this->demande();
                break;

                
            case "ajouter":
                $id = isset($_GET['id']) ? $_GET['id'] : "Error" ;
                $this->ajouter($id);
                break;

            default:
                /*$_SESSION["erreur"] = "Erreur action incorrecte.";*/
                $this->demander();
                $this->vue->affiche_barre();
                $this->demande();
                break;
        }
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
     }
}
?>
