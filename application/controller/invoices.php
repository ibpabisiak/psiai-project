<?php

class Invoices extends Controller {

	private $invoice_type = 'sales'; //TODO jakies lepsze rozwiazanie do tego albo rozbic to na 2 moduly;
	
	public function index() {
        
		$invoices_model = $this->loadModuleModel('invoices_model');
		$contractors_list = $invoices_model->LoadContractorsList();
		$taxes_list = $invoices_model->LoadTaxesList();
		
		require 'application/views/_common/header.tpl.php';
        require 'application/views/invoices/invoices_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
	}
	
	public function add_invoice() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoices')) {
			$invoices_model = $this->loadModuleModel('invoices_model');
			if(isset($_POST['invoice_name']) && isset($_POST['amount_netto']) && isset($_POST['amount_brutto'])) {
				$invoices_model->AddInvoice(
					$_FILES["fileToUpload"], 
					$_POST['contractor_id'], 
					$_POST['invoice_type'], 
					$_POST['invoice_name'], 
					$_POST['amount_netto'], 
					$_POST['amount_brutto'],
					$_POST['tax_id'],
					$_POST['invoice_number']
				);

			}			
		} else {
			exit("Nie masz do tego uprawnień");
		}

	}

	public function add_new_contractor() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoices')) {
			if(isset($_POST['contracotr_nip']) && isset($_POST['contractor_name'])) {
				$invoices_model = $this->loadModuleModel('invoices_model');
				$invoices_model->AddContractor($_POST['contractor_name'], $_POST['contracotr_nip']);
				header("Location: index.php?module=invoices");
			} else {
				
			}
		} else {
			exit("Nie masz do tego uprawnień");
		}
		
	}
	
}
