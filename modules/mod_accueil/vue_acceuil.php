<?php
require_once 'vue_generique.php';

class VueAccueil extends VueGenerique {

    public function bienvenue() {
        echo '
        <head>
            <link rel="stylesheet" href="styleAccueil.css">
        </head>
        <body>
            <h1>Description du jeu</h1>
            <div class=" accueil typewriter-text">
                <p>Bienvenue sur le site du jeu <u>Tower Defense</u> !

                Comme vous l\'avez sans doute remarqué, il s\'agit d\'un jeu de tower defense sur le thème <em>fantaisie</em>.
                Dans le jeu <u>Tower Defense</u>, vous devrez défendre votre royaume des effroyables <u><a class="lien-special" href="index.php?module=monstres&action=monstres">monstres</a></u> qui tentent de l\'envahir !
                Pour cela, vous avez à votre disposition des <u><a class="lien-special" href="index.php?module=tours&action=tours">tours</a></u>. Malheureusement, votre royaume est assez pauvre et vous n\'avez pas beaucoup d\'argent, 
                mais ne vous inquiétez pas car vous pouvez en gagner facilement en tuant les monstres. Vous recevrez autant d\'argent que d\'XP.</p>
            </div>
        </body>
        ';
    }
}
?>
