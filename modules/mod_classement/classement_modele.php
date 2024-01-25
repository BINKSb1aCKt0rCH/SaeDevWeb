<?php
include_once 'Connexion.php';
class classementModele extends Connexion{
    public function __construct(){
        parent::initConnexion();
    }
    public function getClassement(){
        echo 'ok';
        $req = self::$bdd->query("Select avatar, nomJoueur, score 
        from Joueur natural join Partie order by  score desc");
        $res = $req->fetchAll();
        return $res;
    }
}

?>