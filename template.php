<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense</title>
    <link rel ="stylesheet" href="style.css">
</head>
<body>
<header>
    <div><h1>Tower Defense</h1></div>
    <nav>
        <button>Tours</button>
        <button>Ennemis</button>
        <a href="index.php?modules=mod_classement&action=afficher" >Classement</a>
        <button>Se connecter</button>

        <div class="login-icon"></div>  <!-- Bouton pour se connecter/s inscrire -->
    </nav>';
</header>
<main>
    <!-- Contenu de la page -->
    <?php
        $module = isset($_GET['module'])? $_GET['module'] : 'mod_joueurs';
        switch($module){
            case 'classement':
                include_once 'modules/mod_classement/' .$module .'.php';
                Connexion::initConnexion();
                $contClassement = new ClassementControleur();
                break;
        }
    ?>
</main>
<footer>
    <p>Tower Defense / Informations légales</p>
</footer>
</body>
</html>
