<?php

class Documents extends Controller {

	public function index() {
        
		require 'application/views/_common/header.tpl.php';
        require 'application/views/documents/documents_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
	}

    public function edit_Document()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('documents')) {

            $invoices_model = $this->loadModuleModel('documents_model');
            $a = $invoices_model->GetdocumentsData($_GET['docment_id']);

//            var_dump($invoices_model->GetdocumentsData($_GET['invoice_id']));


            require 'application/views/_common/header.tpl.php';
            require 'application/views/documents/edit_document.tpl.php';
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
	
	public function documents_catalog() {
		
		$documents_model = $this->loadModuleModel('documents_model');		
		$documents_list = $documents_model->LoadDocumentsList();
		
		require 'application/views/_common/header.tpl.php';
        require 'application/views/documents/documents_catalog.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
	}
	
	
	public function delete_document() {
		if(Functions::GetUserSession()->IsEntitledToWrite('documents')) {
			$invoices_model = $this->loadModuleModel('documents_model');
			$invoices_model->DeleteDocument($_GET['document_id'], "sales");	
			
		} else {
			exit("Nie masz do tego uprawnień");
		}	
	}
	
	public function add_document() {
		if(Functions::GetUserSession()->IsEntitledToWrite('documents')) {
			$documents_model = $this->loadModuleModel('documents_model');

            $file = 0;
			$id = 	0;

            if (empty($_POST['document_id'])) {
                $id = 1;
            } else {
                $id= 0;
            }

            if( ($file == 0) && ($id == 0)) {
                $documents_model->AddDocument(
                    $_FILES["fileToUpload"],
                    $_POST['document_id'],
                    $_POST['document_notes']);


                header("Location: index.php?module=documents&page=documents_catalog");

			}else{
                require 'application/views/_common/header.tpl.php';
                require 'application/views/documents/documents_validation.tpl.php';
                require 'application/views/_common/footer.tpl.php';

            }



		}
	}
	

}


