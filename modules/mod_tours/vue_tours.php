<?php 

require_once 'vue_generique.php';

class VueTours extends VueGenerique{
/*
    public function getNom($nom){
        echo $nom['nomTour'];
    }

    public function getPuissance($puissance){
        echo $puissance['puissance'];
    }

    public function getPrix($prix){
        echo $prix['prix'];
    }

    public function getPortee($portee){
        echo $portee['portee'];
    }

    public function getImage($image){
        echo '<img src="images/'.$image.'"/>';
    }
*/
    public function afficheTours($tab){
        echo '
        <head>
        <link rel="stylesheet" href="styleTour.css">
        </head>
        <h1>Les Tours</h1>
        <table> 
            <tbody>
                <tr>
        ';
        foreach ($tab as $tours){
            echo '
                <td class="case">
                    <img src="'.$tours['image'].'">
                    <ul>
                        <li class="gray"> nom : '.$tours['nomTour'].'</li>
                        <li class="blanc"> puissance : '.$tours['puissance'].'</li>
                        <li class="gray"> prix : '.$tours['prix'].'</li>
                        <li class="blanc"> portée : '.$tours['portee'].'</li>
                    </ul>
                </td>';
        }

        echo '
                </tr>
            </tbody>
            </table>
            ';
    }

}
?>