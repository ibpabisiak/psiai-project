<?php

class Licenses extends Controller {

	  public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('licenses')) {
            $invoices_model = $this->loadModuleModel('licenses_model');
            $invoices_list = $invoices_model->listAll();
            require 'application/views/_common/header.tpl.php';
            require 'application/views/licenses/licenses_index.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }



    public function edit_licenses()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('licenses')) {

            $invoices_model = $this->loadModuleModel('licenses_model');
            $a = $invoices_model->GetlicensesData($_GET['id_invoice']);

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
	
}


