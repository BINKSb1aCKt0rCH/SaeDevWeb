<?php
require_once 'modele_connexion.php';
require_once 'vue_connexion.php';
require_once 'modele_connexion.php';


class ContConnexion {
    public $vue_connexion;
    public $modele_connexion;
    private $action;

    public function __construct() {
        $this->vue_connexion = new VueConnexion();
        $this->modele_connexion = new ModeleConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : '';
    }

    public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomJoueur = isset($_POST['nomJoueur']) ? $_POST['nomJoueur'] : '';
            $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';

            if (!empty($nomJoueur) && !empty($passwd)) {
                $nomJoueur_existant = $this->modele_connexion->verifiernomJoueurExistant($nomJoueur);

                if ($nomJoueur_existant) {
                    echo "Ce nomJoueur est déjà utilisé. Veuillez choisir un autre.";
                    $this->form_inscription();
                } else {
                    $mot_de_passe_hash = password_hash($passwd, PASSWORD_DEFAULT);

                    if ($this->modele_connexion->ajouterUtilisateur($nomJoueur, $mot_de_passe_hash)) {
                        echo "Inscription réussie !";
                    } else {
                        echo "Erreur lors de l'inscription.";
                    }
                }
            } else {
                echo "Veuillez remplir tous les champs du formulaire.";
            }
        }
    }

    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomJoueur = isset($_POST['nomJoueur']) ? $_POST['nomJoueur'] : '';
            $passwd= isset($_POST['passwd']) ? $_POST['passwd'] : '';
    
		    $utilisateur = $this->modele_connexion->verifiernomJoueurExistant($nomJoueur);

            if ($utilisateur !== null && password_verify($passwd, $utilisateur['passwd'])) {
                $_SESSION['user_id'] = $utilisateur['idJoueur'];
                echo "Vous êtes connecté sous l'identifiant " . $utilisateur['nomJoueur'];
            } else {
                echo "Informations de connexion incorrectes.";
                $this->vue_connexion->affiche_formulaire_connexion();
            }
        } else {
            $this->vue_connexion->affiche_formulaire_connexion();
        }
    }

    public function deconnexion() {
        unset($_SESSION['user_id']);
    }

    public function form_inscription() {
        $this->vue_connexion->affiche_formulaire_inscription();
    }
    

    public function getAffichage() {
        $affichage = $this->vue_connexion->getAffichage();
        return $affichage;
    }
    

    public function exec() {
        switch ($this->action) {
            case 'afficher':
                $this->form_inscription();
                break;
            case 'inscription':
                $this->inscription();
                break;
            case 'connexion':
                $this->connexion();
                break;
            case 'deconnexion':
                $this->deconnexion();
                break;
        }
    }
}
?>
