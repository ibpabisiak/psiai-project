<?php

class Invoices extends Controller {

	private $invoice_type = 'purchase'; //TODO jakies lepsze rozwiazanie do tego albo rozbic to na 2 moduly;
	
	public function index() {
        
		require 'application/views/_common/header.tpl.php';
        require 'application/views/invoices/invoices_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
	}
	
	public function add_purchase_invoice() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoices')) {
			$invoices_model = $this->loadModuleModel('invoices_model');
			$invoices_model->AddInvoice($_FILES["fileToUpload"], 0);			
		} else {
			exit("Nie masz do tego uprawnień");
		}

	}

	public function delete_purchase_invoice() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoices')) {
			$invoices_model = $this->loadModuleModel('invoices_model');
			$invoices_model->DeleteInvoice($_GET['invoice_id'], $this->invoice_type);	
			
		} else {
			exit("Nie masz do tego uprawnień");
		}
		
	}
	
	public function second_page() {
		echo "hehe";
	}
	
}
