<?php 

require_once 'vue_generique.php';

class VueMonstres extends VueGenerique{

    public function afficheMonstres($tab){
        echo '
        <head>
        </head>
        <h1>Les Monstres</h1>
        <table> 
            <tbody>
                <tr>
        ';
        foreach ($tab as $monstres){
            echo '
                <td class="case">
                    <img src="'.$monstres['image'].'">
                    <ul>
                        <li > nom : '.$monstres['nomEnnemi'].'</li>
                        <li > PV : '.$monstres['pv'].'</li>
                        <li > XP : '.$monstres['XP'].'</li>
                        <li > vitesse : '.$monstres['vitesse'].'</li>
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