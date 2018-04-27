<?php

class Licenses extends Controller {

	  public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('licenses')) {

			require 'application/views/_common/header.tpl.php';
            require 'application/views/licenses/licenses_index.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }
	
	public function delete_license() {
		if(Functions::GetUserSession()->IsEntitledToWrite('licenses')) {
			$invoices_model = $this->loadModuleModel('licenses_model');
			$invoices_model->DeleteLicense($_GET['license_id'], "sales");	
			header("Location: index.php?module=licenses&page=licenses_catalog");
		} else {
			exit("Nie masz do tego uprawnień");
		}	
	}
	
	public function add_license() {
		if(Functions::GetUserSession()->IsEntitledToWrite('licenses')) {
			$license_model = $this->loadModuleModel('licenses_model');		

			$license_model->AddLicense(
				$_FILES["fileToUpload"],
				$_POST['description'],
				$_POST['serial_number'],
				$_POST['technical_support'],
				$_POST['licenses_till'],
				$_POST['whos_is_licenses'],
				$_POST['another_note']
			);


			header("Location: index.php?module=licenses&page=licenses_catalog");	
		}
	}
	
	public function licenses_catalog() {
            $invoices_model = $this->loadModuleModel('licenses_model');
            $invoices_list = $invoices_model->listAll();
            require 'application/views/_common/header.tpl.php';
            require 'application/views/licenses/licenses_catalog.tpl.php';
            require 'application/views/_common/footer.tpl.php';
	}
	
}


