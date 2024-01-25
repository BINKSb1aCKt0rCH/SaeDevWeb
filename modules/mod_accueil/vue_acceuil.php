<?php
require_once 'vue_generique.php';

class VueAccueil extends VueGenerique{

    public function bienvenue(){
    echo '
    <head>
        <link rel="stylesheet" href="styleAccueil.css">
    </head>
    <body>
        <h1>Description du jeu</h1>
    <div class="accueil">
        <p>Bienvenue sur le site du jeu <u>Tower Defense</u> !</p>

            Comme vous l\'avez sans doute remarqué, il s\'agit d\'un jeu de tower defense sur le thème <em>fantisie</em>.
        </p>
        <p>
            Dans le jeu <u>Tower Defense</u> vous devrez défendre votre royaume des effroyables <a href="index.php?module=monstres&action=monstres">monstres</a> qui tente de l\'envahir !
        </p>
        <p>
            Pour cela, tu as a ta disposition des <a href="index.php?module=tours&action=tours">tours</a>. Malheureusement, ton royaume est assez pauvre et tu n\'as pas beaucoup d\'argent, 
            mais ne t\'inquiète pas car tu peut en gagner facilement en tuant les monstres. Tu recevras autant d\'argent que d\'XP.
        </p>

    </div>
    </body>
     ';
    
    }
}

?>