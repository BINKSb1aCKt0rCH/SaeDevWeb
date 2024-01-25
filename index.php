<?php
session_start();
require_once 'modules/mod_connexion/mod_connexion.php';
require_once 'modules/mod_ami/mod_ami.php';
require_once 'Connexion.php';
require_once 'composants/CompMenu.php';
require_once 'modules/mod_classement/classement_mod.php';
require_once 'modules/mod_profil/mod_profil.php';

Connexion::initConnexion();


$mod = null; 
$contenuModule = '';

if (isset($_GET['module'])) {
    $module = $_GET['module'];
   
    switch ($module) {
        case 'tours':
            $mod = new ModTours();
            break;

        case 'ennemis':
            $mod = new ModEnnemis();
            break;    

        case 'connexion':
            $mod = new ModConnexion();
            break;
        case 'classement':
            $mod = new ModClassement();
            break;
        case 'profil':
            $mod = new ModProfil();
            break;
        }
    
    }

if ($mod !== null) {
    $contenuModule = $mod->getAffichage();
}
    $menu = new CompMenu();
    require_once 'template.php';
?>
