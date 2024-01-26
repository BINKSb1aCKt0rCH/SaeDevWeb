<?php
session_start();
require_once 'modules/mod_connexion/mod_connexion.php';
require_once 'modules/mod_ami/mod_ami.php';
require_once 'modules/mod_tours/mod_tours.php';
require_once 'modules/mod_monstres/mod_monstres.php';
require_once 'Connexion.php';
require_once 'composants/CompMenu.php';
require_once 'modules/mod_classement/classement_mod.php';
require_once 'modules/mod_profil/mod_profil.php';
require_once 'modules/mod_accueil/mod_accueil.php';

Connexion::initConnexion();

$contenuModule = '';

$module = isset($_GET['module']) ? $_GET['module'] : 'accueil';

switch ($module) {
    case 'accueil':
        default:
        $modAccueil = new ModuleAccueil();
        $contenuModule = $modAccueil->getAffichage();
        break;

    case 'tours':
        $modTours = new ModuleTours();
        $contenuModule = $modTours->getAffichage();
        break;

    case 'monstres':
        $modMonstres = new ModuleMonstres();
        $contenuModule = $modMonstres->getAffichage();
        break;    

    case 'connexion':
        $modConnexion = new ModConnexion();
        $contenuModule = $modConnexion->getAffichage();
        break;
    case 'classement':
        $modClassement = new ModClassement();
        $contenuModule = $modClassement->getAffichage();
        break;

    case 'ami':
        $modAmi = new ModAmi();
        $contenuModule = $modAmi->getAffichage();
        break;

    case 'profil':
        $modProfil = new ModProfil();
        $contenuModule = $modProfil->getAffichage();
        break;
}

/*if ($mod !== null) {
    $contenuModule = $mod->getAffichage();
}*/

$menu = new CompMenu();
require_once 'template.php';
?>
