<?php

class Documents extends Controller {

	public function index() {
        
		require 'application/views/_common/header.tpl.php';
        require 'application/views/documents/documents_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
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

			$documents_model->AddDocument(
				$_FILES["fileToUpload"],
				$_POST['document_id'],
				$_POST['document_notes']
			);


			header("Location: index.php?module=documents&page=documents_catalog");			
		}
	}
	
}


