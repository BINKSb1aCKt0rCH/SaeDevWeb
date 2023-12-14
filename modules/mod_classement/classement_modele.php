<?php
include_once 'connexion.php';
class classementModele extends Connexion{
    public function __construct(){
        parent::iniConnexion();
    }
    public function getClassement(){
        $req = $self::$bdd->query("Select nomJoueur, score 
        from Joueur natural join idJoueur");
        $res = $req->fetchAll();
        return $res;
    }
}

?>