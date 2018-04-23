<?php
 
class InvoicesCatalog extends Controller {
 
    public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('invoicescatalog')) {
            $invoices_model = $this->loadModuleModel('invoicescatalog_model');
            $invoices_list = $invoices_model->listAll(); 
			require 'application/views/_common/header.tpl.php';
			require 'application/views/invoicescatalog/invoicescatalog_index.tpl.php';
			require 'application/views/_common/footer.tpl.php';        
        } else {
            exit("Nie masz do tego uprawnień");
        } 
    }
	
	public function delete_invoice() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoicescatalog')) {
			$invoices_model = $this->loadModuleModel('invoicescatalog_model');
			$invoices_model->DeleteInvoice($_GET['invoice_id'], "sales");	
			
		} else {
			exit("Nie masz do tego uprawnień");
		}
		
	}
   
}
