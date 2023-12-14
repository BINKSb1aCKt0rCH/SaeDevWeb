<?php

class Site {

	private $moduleName;
	private $module;

    public function __construct(){
        $this->moduleName = isset($_GET['module']) ? 
        $_GET['module'] : "Bienvenue";

        switch($this->moduleName){
            case "classement" : 
                require_once "modules/mod_".$this->moduleName."/module_"
                .$this->moduleName.".php";
                break;
        }
    }
    public function exec_module(){
        $module_class = "Mod" .$this->moduleName;
        $this->module = new $module_class();
        $this->module->exec();
    }
}
?>