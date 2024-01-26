<?php 

require_once 'vue_generique.php';

class VueMonstres extends VueGenerique{

    public function afficheMonstres($tab){
        echo '
        <head>
        <link rel="stylesheet" href="styleTour.css">
        </head>
        <h1>Les Monstres</h1>
        <div class="card-container">
        ';
        foreach ($tab as $monstres){
            echo '
                <div class="card">
                    <img src="'.$monstres['image'].'">
                    <ul>
                        <li class="blanc"> nom : '.$monstres['nomEnnemi'].'</li>
                        <li class="gray"> PV : '.$monstres['pv'].'</li>
                        <li class="blanc"> XP : '.$monstres['XP'].'</li>
                        <li class="gray"> vitesse : '.$monstres['vitesse'].'</li>
                    </ul>
                </div>';
        }

        echo '
            </div>
            ';
    }

}
?>
