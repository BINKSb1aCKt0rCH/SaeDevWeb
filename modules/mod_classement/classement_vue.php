<?php
require_once 'vue_generique.php';
 
class ClassementVue extends VueGenerique{
    public function afficheClassement($tab) {
    echo'<head>
    <meta charset="utf-8">
    <title>Classement</title>
    <link rel="stylesheet" href="style/classement_style.css">
    <script src="scriptProfil.js"></script>
    </head>';
     ?><h1>Classement</h1>
     <?php
        echo '<div class="classement-container">';
        echo '<ol class="classement-list">';
        foreach ($tab as $classement) {
            echo '
                <li class="classement-item">
                '?>
                    <span class="nom-joueur"> <?=$classement['nomJoueur'] ?></span>
                    <span class="score"> <?=$classement['score'] ?></span>
                </li>
                <?php
        }
        echo '</ol>';
        echo '</div>';
    }
}
?>