<?php

class Equipment extends Controller {



	public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('equipment')) {

		require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/equipment_index.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }
<<<<<<< HEAD




    public function edit_equipment()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('equipment')) {

            $invoices_model = $this->loadModuleModel('equipment_model');
            $a = $invoices_model->GetEquipmentData($_GET['invoice_id']);

            var_dump($invoices_model->GetequipmentData($_GET['invoice_id']));


            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/edit_equipment.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }

    public function SaveEdit_equipment()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('equipment')) {

            $invoices_model = $this->loadModuleModel('equipment_model');
            /*if (isset($_POST['buttonsave'])) {*/


            $invoices_model->UpdateInvoice($invoices_model->GetequipmentData($_GET['invoice_id'] ) ,
                $_POST['inventary_number'],
                $_POST['description'],
                $_POST['serial_number'],
                $_POST['date_of_purschure'],
                $_POST['invoice_id'],
                $_POST['warranty'],
                $_POST['amount_netto'],
                $_POST['whos_is_equipment'],
                $_POST['netto_value']
        );

            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/edit_equipment.tpl.php';
            require 'application/views/_common/footer.tpl.php';

            /* }*/
        } else {
            exit("Nie masz do tego uprawnień");
        }


    }






=======
	
	public function equipment_catalog() {
		
		
            $invoices_model = $this->loadModuleModel('equipment_model');
            $invoices_list = $invoices_model->listAll();
            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/equipment_catalog.tpl.php';
            require 'application/views/_common/footer.tpl.php';		
	}
	
>>>>>>> 59009c5dea6da6e4562d2d853459fbd6b2e2a904
}


