<?php

class Documents extends Controller {

	public function index() {
        
		require 'application/views/_common/header.tpl.php';
        require 'application/views/documents/documents_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
	}

    public function edit_Documents()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('documents')) {

            $invoices_model = $this->loadModuleModel('documents_model');
            $a = $invoices_model->GetdocumentsData($_GET['invoice_id']);

            var_dump($invoices_model->GetdocumentsData($_GET['invoice_id']));


            require 'application/views/_common/header.tpl.php';
            require 'application/views/documents/edit_documents.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }

    public function SaveEdit_Documents()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('documents')) {

            $invoices_model = $this->loadModuleModel('documents_model');

            $invoices_model->Updatedocuments($invoices_model->GetdocumentsData($_GET['invoice_id']),
                $_FILES["fileToUpload"],
                $_POST['document_user_id'],
                $_POST['file_id '],
                $_POST['notes'],
                $_POST['date']);

            require 'application/views/_common/header.tpl.php';
            require 'application/views/documents/edit_documents.tpl.php';
            require 'application/views/_common/footer.tpl.php';

        } else {
            exit("Nie masz do tego uprawnień");
        }


    }
}


