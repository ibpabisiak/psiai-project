<?php

class Licenses extends Controller {

	  public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('licenses')) {
            $invoices_model = $this->loadModuleModel('licenses_model');
            $invoices_list = $invoices_model->listAll();
            require 'application/views/_common/header.tpl.php';
            require 'application/views/licenses/licenses_index.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }
	
}


