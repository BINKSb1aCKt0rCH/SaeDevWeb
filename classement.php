<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense</title>
    <link rel ="stylesheet" href="style/style.css">
</head>
<body>
<header>
    <div><h1>Tower Defense</h1></div>
    <nav>
        <ul>
        <li><button>Tours</button></li>
        <li><button>Ennemis</button></li>
                <li class="deroulant">
            <a href="classement.php?module=mod_classement&action=afficher">Classement</a>
            <ul class="sous">
                <li><a href="classement.php?module=mod_classement&action=afficher">Terrain 1</a></li>
                <li><a href="classement.php?module=mod_classement&action=afficher">Terrain 2</a></li>
            </li>

        <li><button>Se connecter</button></li>

        <div class="login-icon"></div>  <!-- Bouton pour se connecter/s inscrire -->
</ul>
    </nav>';
</header>
<main>
    <!-- Contenu de la page -->
    <h1>Classement mondial<h1>
    <?php
    /*
        $module = isset($_GET['module'])? $_GET['module'] : 'mod_classement';
        switch($module){
            case 'classement':
                include_once 'modules/mod_classement/' .$module .'.php';
                Connexion::initConnexion();
                $modClassement = new ClassementMod();
                break;
        }*/
        require_once "modules/mod_classement/classement_mod.php";
        $modClassement = new ClassementMod();
    ?>
</main>
<footer>
    <p>Tower Defense / Informations légales</p>
</footer>
</body>
</html>
