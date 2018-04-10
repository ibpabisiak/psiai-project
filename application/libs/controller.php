<?php
require_once 'application/libs/controller_interface.php';

abstract class Controller implements ControllerInterface {
    public $db = null;

    function __construct() {
        $this->connecToDatabase(); 
    }

	private function connecToDatabase() {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

    public function loadModel($model_name) {
        require 'application/models/' . strtolower($model_name) . '.php';

        return new $model_name($this->db);
    }
	
	protected function checkLogin() {
		//TODO 
		
		return false;
	}

	
}
