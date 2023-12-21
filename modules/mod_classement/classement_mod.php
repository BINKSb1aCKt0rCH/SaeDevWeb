<?php
require_once "modules/mod_classement/classement_cont.php";

class ClassementMod{
    public function __construct(){
        $this->controleur = new ClassementControleur();
        $this->controleur->exec();
    }
}
?>