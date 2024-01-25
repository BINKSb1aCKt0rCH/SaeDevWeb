<?php 

require_once 'vue_generique.php';

class VueTours extends VueGenerique{

    public function afficheTours($tab){
        echo '
        <head>
        <link rel="stylesheet" href="styleTour.css">
        </head>
        <h1>Les Tours</h1>
        <div class="card-container">
        ';
        foreach ($tab as $tours){
            echo '
                <div class="card">
                    <img src="'.$tours['image'].'">
                    <ul>
                        <li class="gray"> nom : '.$tours['nomTour'].'</li>
                        <li class="blanc"> puissance : '.$tours['puissance'].'</li>
                        <li class="gray"> prix : '.$tours['prix'].'</li>
                        <li class="blanc"> portée : '.$tours['portee'].'</li>
                    </ul>
                </div>';
        }

        echo '
            </div>
            ';
    }
}
?>
