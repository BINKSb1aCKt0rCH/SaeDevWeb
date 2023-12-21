<?php
include_once 'connexion.php';
class classementModele extends Connexion{
    public function __construct(){
        parent::initConnexion();
    }
    public function getClassement(){
        $req = self::$bdd->query("Select nomJoueur, score 
        from Joueur natural join Partie order by  score desc");
        $res = $req->fetchAll();
        return $res;
    }
}

?>