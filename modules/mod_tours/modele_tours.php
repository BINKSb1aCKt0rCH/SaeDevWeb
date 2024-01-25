<?php
require_once 'Connexion.php';

class ModeleTours extends Connexion{

    public function getAllTours(){
        $sql = 'SELECT * FROM Tour';
        $req = self::$bdd->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>