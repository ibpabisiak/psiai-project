<?php
 
class InvoicesCatalog extends Controller {


    public $a;

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


    public function edit_invoice()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('invoicescatalog')) {

            $invoices_model = $this->loadModuleModel('invoicescatalog_model');
            $a = $invoices_model->GetInvoiceData($_GET['invoice_id']);

            var_dump($invoices_model->GetInvoiceData($_GET['invoice_id']));


            require 'application/views/_common/header.tpl.php';
            require 'application/views/invoicescatalog/edit_invoice.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }

   public function SaveEdit_invoice()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('invoicescatalog')) {

            $invoices_model = $this->loadModuleModel('invoicescatalog_model');
            /*if (isset($_POST['buttonsave'])) {*/


                $invoices_model->UpdateInvoice($invoices_model->GetInvoiceData($_GET['invoice_id']),
                    $_FILES["fileToUpload"],
                    $_GET['invoice_id'],
                    $_POST['contractor_id'],
                    $_POST['invoice_type'],
                    $_POST['invoice_name'],
                    $_POST['amount_netto'],
                    $_POST['amount_brutto'],
                    $_POST['tax_id'],
                    $_POST['invoice_number'] );

            require 'application/views/_common/header.tpl.php';
            require 'application/views/invoicescatalog/edit_invoice.tpl.php';
            require 'application/views/_common/footer.tpl.php';

           /* }*/
        } else {
            exit("Nie masz do tego uprawnień");
        }


    }




}
