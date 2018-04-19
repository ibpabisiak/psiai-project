<?php
 
class InvoicesCatalog extends Controller {
 
    public function index() {
       
        require 'application/views/_common/header.tpl.php';
        require 'application/views/invoicescatalog/invoicescatalog_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';    
    }
   
    public function list_stuff() {
        if(Functions::GetUserSession()->IsEntitledToWrite('invoicescatalog')) {
            $invoices_model = $this->loadModuleModel('invoicescatalog_model');
            $invoices_model->listAll();        
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }
   
    public function second_page() {
        echo "hehe";
    }
   
}
