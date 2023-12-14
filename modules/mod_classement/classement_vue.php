<?php
class ClassementVUe{
    public function afficheClassement($tab){
        foreach($tab as $class){
            echo '
            <ul>
                <li>
                    <a href ="index.php?module=mod_classement&action=afficher&"' 
                    .$tab['nomJoueur'] .$tab['score'] .'">'
                .'<li>
            <ul>';
        }
    }
}

?>