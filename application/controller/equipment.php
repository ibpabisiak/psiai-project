<?php

class Equipment extends Controller {

	public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('equipment')) {

		require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/equipment_index.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }
	
	public function equipment_catalog() {
		
		
            $invoices_model = $this->loadModuleModel('equipment_model');
            $invoices_list = $invoices_model->listAll();
            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/equipment_catalog.tpl.php';
            require 'application/views/_common/footer.tpl.php';		
	}
	
}


