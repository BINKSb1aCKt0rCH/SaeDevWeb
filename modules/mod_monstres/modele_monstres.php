<?php
require_once 'Connexion.php';

class ModeleMonstres extends Connexion{

    public function getAllMonstres(){
        $sql = 'SELECT * FROM Ennemi';
        $req = self::$bdd->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>