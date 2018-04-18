<?php

class Invoices extends Controller {

	public function index() {
        
		require 'application/views/_common/header.tpl.php';
        require 'application/views/invoices/invoices_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
	}
	
	public function upload() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoices')) {
			$invoices_model = $this->loadModuleModel('invoices_model');
			$invoices_model->AddInvoice($_FILES["fileToUpload"], 0);			
		} else {
			exit("Nie masz do tego uprawnień");
		}

	}
	
	public function second_page() {
		echo "hehe";
	}
	
}
