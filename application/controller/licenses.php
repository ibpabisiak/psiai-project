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



    public function edit_license()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('licenses')) {

            $invoices_model = $this->loadModuleModel('licenses_model');
            $a = $invoices_model->GetlicensesData($_GET['invoice_id']);

            require 'application/views/_common/header.tpl.php';
            require 'application/views/licenses/edit_licenses.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }

    public function SaveEdit_licenses()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('licenses')) {

            $invoices_model = $this->loadModuleModel('licenses_model');
            /*if (isset($_POST['buttonsave'])) {*/


            $invoices_model->Updatelicenses($invoices_model->GetlicensesData($_GET['id_invoice']),
                $_POST['inventary_number'],
                $_POST['description'],
                $_POST['serial_number'],
                $_POST['id_invoice'],
                $_POST['licenses_till'],
                $_POST['whos_is_licenses'],
                $_POST['another_note'] ,
                $_POST['technical_support'] );



            require 'application/views/_common/header.tpl.php';
            require 'application/views/licenses/edit_licenses.tpl.php';
            require 'application/views/_common/footer.tpl.php';

            /* }*/
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


            $description = 0;
            $serial_number = 0;
            $technical_support = 0;
            $licenses_till = 0;
            $whos_is_licenses = 0;
            $another_note = 0;

            if (empty($_POST['description'])) {
                $description = 1;
            } else {
                $description = 0;
            }

            if (empty($_POST['serial_number'])) {
                $serial_number = 1;
            } else {
                $serial_number = 0;
            }


            if (empty($_POST['technical_support'])) {
                $technical_support = 1;
            } else {
                $technical_support = 0;
            }

            if (empty($_POST['licenses_till'])) {
                $licenses_till = 1;
            } else {
                $licenses_till = 0;
            }

            if (empty($_POST['whos_is_licenses'])) {
                $whos_is_licenses = 1;
            } else {
                $whos_is_licenses = 0;
            }



            if (   ($description == 0) && ($serial_number == 0) && ($technical_support == 0) && ($licenses_till == 0) && ($whos_is_licenses == 0) ) {

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
        } else {

                require 'application/views/_common/header.tpl.php';
                require 'application/views/licenses/licenses_validation.tpl.php';
                require 'application/views/_common/footer.tpl.php';
            }
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


