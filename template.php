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

    <?php

    $vueConnexion = new VueConnexion();

    $menu = new CompMenu();
    ?>

    <header>
        <div style="text-align: left;">
            <a href="index.php?module=accueil&action=accueil">
                <div class="logo"></div> 
            </a>
        </div>
        <?php

        if (isset($menu)) {
            $menu->affiche();
        }

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
