<?php
class ClassementVUe{
    public function afficheClassement($tab){
        echo '<ol>';
        foreach($tab as $classement){
            echo '
                <li>
                    '.$classement['nomJoueur'] .' ' .$classement['score'] .'
                </li>';
        }
        echo '</ol>';
    }
}
?>