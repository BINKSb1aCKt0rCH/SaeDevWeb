<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="animation-container">

        <div class="meteor"></div>
        <div class="meteor"></div>
        <div class="meteor"></div>
        <div class="meteor"></div>
        <div class="meteor"></div>
        <div class="meteor"></div>

        <div class="firework"></div>
        <div class="firework"></div>
        <div class="firework"></div>
    </div>
    
    
<!-- Ajoutez autant de divs "firework" que vous le souhaitez -->


    <?php
    // Démarrer la session au début du script
    /*session_start();*/

    // Inclure la classe VueConnexion
    /*require_once 'vue_connexion.php';*/

    // Création d'une instance de VueConnexion
    $vueConnexion = new VueConnexion();

    // Inclure le menu (assurez-vous que cette classe est également incluse si nécessaire)
    /*require_once 'CompMenu.php';*/
    $menu = new CompMenu();
    ?>

    <header>
        <div style="text-align: left;">
            <a href="index.php?module=accueil&action=accueil">
                <div class="logo"></div> 
            </a>
        </div>
        <?php
        // Afficher le menu
        if (isset($menu)) {
            $menu->affiche();
        }

        // Afficher la barre de recherche si l'utilisateur est connecté
        /*$vueConnexion->affiche_barre_recherche();*/
        ?>
    </header>


    <main>
        <?php echo ''.$contenuModule; ?>
    </main>

    <footer>
        <p>&copy; 2023-2024 Esteban, Zakaria, Sofia. Tous droits réservés.</p>
    </footer>
</body>
</html>
